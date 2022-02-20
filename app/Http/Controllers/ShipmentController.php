<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ShipmentsExport;
use App\Imports\ShipmentsImport;
// use App\exports\ShipmentsExport;
// use App\Exports\
use App\Exports\bulkExport;

use App\Models\City;
use App\Models\Country;
// use App\Models\sCountry;
use App\Models\payment_mode;
use App\Models\service_mode;
use App\Models\shipment;
use App\Models\shipment_status;
use App\Models\Zone;
use Illuminate\Http\Request;

use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ShipmentController extends Controller
{
    public function index()
    {


        // $ship = shipment::find(32)->get();
        // dd($ship[0]->ship_zone);

        // return view('rpo.index',compact('rpos'));

        // $shipments = shipment::all();
        $shipments = shipment::where('deleted_or_not_integer',0)->where('archive_int',0)->latest()->paginate(10);

        // $s = shipment::find(2);
        // dd($s->city);

        // dd($shipments);
        return view('shipment.allshipments',['shipments'=>$shipments]);
    }
    public function inTransit_shipments()
    {
        $shipments = shipment::where('deleted_or_not_integer',0)->where('archive_int',0)->where('status',3)->latest()->paginate(10);
        return view('shipment.InTransitshipments',['shipments'=>$shipments]);
    }
    public function archive_shipments()
    {
        $shipments = shipment::where('archive_int',1)->latest()->paginate(10);
        return view('shipment.archive_shipments',['shipments'=>$shipments]);
    }
    public function return_to_client()
    {
        $shipment = shipment::where('deleted_or_not_integer',0)->where('archive_int',0)->where('return_to_client_integer',1)->paginate(10);

        // $users = DB::table('shipments')
        //         ->where('return_to_client_integer', '=', 1)
        //         ->where('age', '>', 35)
        //         ->get();

        // dd($shipment);
        return view('shipment.return_to_client',['shipments'=>$shipment]);
    }
    public function deleted_shipments()
    {
        //if archived, wont' even show in deleted
        $shipment = shipment::where('deleted_or_not_integer',1)->where('archive_int',0)->paginate(10);
        return view('shipment.deleted_shipments',['shipments'=>$shipment]);
    }
    public function delivered_shipments()
    {
        $shipment = shipment::where('deleted_or_not_integer',0)->where('archive_int',0)->where('delivered_to_client_integer',1)->paginate(10);
        return view('shipment.delivered_shipments',['shipments'=>$shipment]);
    }
    public function shipment_delete_restore($id)
    {
        // dd($id);
        $shipment = shipment::find($id);
        $shipment->deleted_or_not_integer = 0;
        $shipment->save();

        return back()->with("success", "Restored.");
    }
    public function shipment_archive($id)
    {
        // dd($id);
        $shipment = shipment::find($id)->first();
        
        $shipment->archive_int = 1;
        $shipment->save();

        return back()->with("success", "Archived.");
        // $ship->save();
        // dd($ship);
        
    }
    public function shipment_delete_from_search($id)
    {
        $shipment = shipment::find($id);
        // $shipment->delete();
        $shipment->deleted_or_not_integer = 1;
        $shipment->save();



        $shipments = shipment::where('deleted_or_not_integer',0)->where('archive_int',0)->latest()->paginate(10);
        return view('shipment.allshipments',['shipments'=>$shipments]);
    }
    public function shipment_archive_from_search($id)
    {
        // dd($id);
        // $shipment = shipment::find($id)->first();
        $s = shipment::find($id);
        // dd($s);
        $s->archive_int = 1;
        $s->save();

        $shipments = shipment::where('deleted_or_not_integer',0)->where('archive_int',0)->latest()->paginate(10);
        return view('shipment.allshipments',['shipments'=>$shipments]);
    }
    public function shipment_De_archive($id)
    {
        // dd('de//');
        $shipment = shipment::find($id)->first();
        
        $shipment->archive_int = 0;
        $shipment->save();

        return back()->with("success", "Archived.");
    }

    

    public function shipment_search(Request $request)
    {
        $shipments = shipment::where('reference','like','%'.$request->search_query.'%')->orderBy('id')->paginate(5);
        // dd($shipments);
        return view('shipment.searched_shipment',['shipments' => $shipments]);
    }

    public function ship_create()
    {

        

        $countries = Country::all();
        $city = City::all();
        $paymode = payment_mode::all();
        $status = shipment_status::all();
        $service_mode = service_mode::all();
        $zones = Zone::all();
        return view('shipment.shipmentcreate',['zones'=>$zones,'countries'=>$countries, 'city' => $city,'paymode'=>$paymode,'status'=>$status,'service_mode'=>$service_mode]);
    }

    public function delete_permanent($id)
    {
        $shipment = shipment::find($id);
        $shipment->delete();
        return back()->with("success", "Deleted.");
    }

    public function shipment_delete($id)
    {
        $shipment = shipment::find($id);
        // $shipment->delete();
        $shipment->deleted_or_not_integer = 1;
        $shipment->save();

        return back()->with("success", "Deleted.");
    }

    public function shipments_updated(Request $request)
    {
        // dd('hi');
        // $shipment = new shipment();
        // dd($request->shipment_id);
        $shipment = shipment::find($request->shipment_id);

        $shipment->AWB = $request->AWB;

        $shipment->zone = $request->zone;

        $shipment->shipper_reference = $request->shipper_reference;

        // dd($request->pod);
        $shipment->pod = $request->pod;


        $shipment->product_type = $request->product_type;
        $shipment->payment_mode = $request->payment_mode;
        $shipment->account_number = $request->account_number;
        $shipment->sender_name = $request->sender_name;
        $shipment->sender_shipment_country = $request->sender_shipment_country;
        $shipment->sender_shipment_city = $request->sender_shipment_city;
        $shipment->sender_city_code = $request->sender_city_code;
        $shipment->sender_address = $request->sender_address;
        $shipment->sender_mobile = $request->sender_mobile;
        $shipment->sender_email = $request->sender_email;
        $shipment->sender_id = $request->sender_id;
        $shipment->receiver_name = $request->receiver_name;
        $shipment->receiver_shipment_country = $request->receiver_shipment_country;
        $shipment->receiver_shipment_city = $request->receiver_shipment_city;
        $shipment->receiver_city_code = $request->receiver_city_code;
        $shipment->receiver_address = $request->receiver_address;
        $shipment->receiver_mobile = $request->receiver_mobile;
        $shipment->receiver_email = $request->receiver_email;
        $shipment->status = $request->status;
        $shipment->parcel = $request->parcel;
        $shipment->length = $request->length;
        $shipment->width = $request->width;
        $shipment->height = $request->height;
        $shipment->Weight = $request->Weight;
        $shipment->service_mode = $request->service_mode;
        $shipment->shipment_value = $request->shipment_value;
        $shipment->description = $request->description;
        $shipment->SKU = $request->SKU;
        $shipment->delivery_charge = $request->delivery_charge;
        $shipment->cod_charge = $request->cod_charge;
        $shipment->additional_charge = $request->additional_charge;
        $shipment->total_charge = $request->total_charge;

        //numbers
        $shipment->return_to_client_integer = $request->return_to_client_integer;

        if($shipment->status == 2)
        {
            $shipment->delivered_to_client_integer = 1;
        }
        else
        {
            $shipment->delivered_to_client_integer = 0;
        }

        // if($shipment->return_to_client_integer == 1)
        // {
        //     $shipment->details = "Return To Client";
        // }
        // else
        // {
        //     $shipment->details = "";
        // }

        $shipment->save();

        // $this->index();
        return back()
        ->with('success','You have successfully submitted');
    }
    public function shipment_store(Request $request)
    {
        // dd('hi');
        // dd($request->zone);

        $shipment = new shipment();
        // dd($request->shipment_id);
        // $shipment = shipment::find($request->shipment_id);

        $request->validate([
            'AWB' => 'required',
            // 'shipper_reference' => 'required',
            'payment_mode' => 'required',
            'product_type' => 'required',
            'sender_name' => 'required',
            'receiver_name' => 'required',
            'sender_shipment_country' => 'required',
            'sender_shipment_city' => 'required',
            'receiver_shipment_city' => 'required',
            'receiver_shipment_country' => 'required',
        ]);



        $shipment->AWB = $request->AWB;

        //reference
        $now = Carbon::now();
        $unique_code = $now->format('YmdHisu');
        $shipment->reference = $unique_code;

        
        $shipment->pod = $request->pod;

        $shipment->shipper_reference = $request->shipper_reference;
        $shipment->zone = $request->zone;
        $shipment->product_type = $request->product_type;
        $shipment->payment_mode = $request->payment_mode;
        $shipment->account_number = $request->account_number;
        $shipment->sender_name = $request->sender_name;
        $shipment->sender_shipment_country = $request->sender_shipment_country;
        $shipment->sender_shipment_city = $request->sender_shipment_city;
        $shipment->sender_city_code = $request->sender_city_code;
        $shipment->sender_address = $request->sender_address;
        $shipment->sender_mobile = $request->sender_mobile;
        $shipment->sender_email = $request->sender_email;
        $shipment->sender_id = $request->sender_id;
        $shipment->receiver_name = $request->receiver_name;
        $shipment->receiver_shipment_country = $request->receiver_shipment_country;
        $shipment->receiver_shipment_city = $request->receiver_shipment_city;
        $shipment->receiver_city_code = $request->receiver_city_code;
        $shipment->receiver_address = $request->receiver_address;
        $shipment->receiver_mobile = $request->receiver_mobile;
        $shipment->receiver_email = $request->receiver_email;
        $shipment->status = $request->status;
        $shipment->parcel = $request->parcel;
        $shipment->length = $request->length;
        $shipment->width = $request->width;
        $shipment->height = $request->height;
        $shipment->Weight = $request->Weight;
        $shipment->service_mode = $request->service_mode;
        $shipment->shipment_value = $request->shipment_value;
        $shipment->description = $request->description;
        $shipment->SKU = $request->SKU;
        $shipment->delivery_charge = $request->delivery_charge;
        $shipment->cod_charge = $request->cod_charge;
        $shipment->additional_charge = $request->additional_charge;
        $shipment->total_charge = $request->total_charge;


        if($shipment->status == 2)
        {
            $shipment->delivered_to_client_integer = 1;
        }
        else
        {
            $shipment->delivered_to_client_integer = 0;
        }

        $shipment->save();

        return back()
        ->with('success','You have successfully submitted');
        
    }
    public function shipment_update($id)
    {
        $shipments = shipment::find($id);
        $countries = Country::all();
        $city = City::all();
        $paymode = payment_mode::all();
        $status = shipment_status::all();
        $service_mode = service_mode::all();
        $zones = Zone::all();
        return view('shipment.updateShipment',['zones'=>$zones,'shipment'=>$shipments,'countries'=>$countries, 'city' => $city,'paymode'=>$paymode,'status'=>$status,'service_mode'=>$service_mode]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ShipmentsExport, 'shipments.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ShipmentsImport,request()->file('file'));
             
        return back();
    }
    public function import_shipments()
    {
        return view('shipment.import_shipments');
    }
    public function export_shipments()
    {
        return view('shipment.export_shipments');
    }
    public function print_shipments()
    {
        return view('shipment.print_shipments');
    }
    public function bulk_print(Request $request)
    {
        // dd($req);
        return Excel::download(new bulkExport($request->awb), 'Bulk_Print_via_AWB.xlsx');


    }
    
}

