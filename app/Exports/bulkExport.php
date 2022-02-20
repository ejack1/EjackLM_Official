<?php

namespace App\Exports;

use App\Models\Shipment;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\City;
use App\Models\service_mode;
// use App\Models\Shipment;
use App\Models\Zone;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class bulkExport implements FromCollection, WithHeadings
{

    protected $id;

    function __construct($id) 
    {
        // dd($id);
            $this->id = $id;
    }


    public function headings():array{
        return[
            'AWB',
            'reference',
            'shipper_reference',
            'Weight',
            'Booking_Mode',
            'product_type',
            'sender_shipment_city',
            'receiver_shipment_city',
            'sender_name',
            'sender_address',
            'sender_mobile',
            'sender_email',
            'description',
            'cod_charge',
            'service_mode',
            'shipment_value',
            'POD',
            'account_number',
            'zone' ,
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // dd('hello');

        // dd($this->id);
        // return Shipment::all();
        $shipments  = Shipment::select('AWB','reference','shipper_reference', 'Weight', 'Booking_Mode','product_type','sender_shipment_city',
        'receiver_shipment_city','sender_name','sender_address','sender_mobile', 'sender_email','description','cod_charge','service_mode','shipment_value',
        'POD','account_number','zone' ,)->where('AWB',$this->id)->get();
        // dd($shipments);

        if($shipments)
        {
            foreach($shipments as $ship)
            {
                $city = City::find($ship->sender_shipment_city); //6
                // dd($city);
                $ship->sender_shipment_city = $city->name;
                // dd($ship);
            }

            foreach($shipments as $ship)
            {
                $city = City::find($ship->receiver_shipment_city); //6
                // dd($city);
                $ship->receiver_shipment_city = $city->name;
                // dd($ship);
            }

            foreach($shipments as $ship)
            {
                $z = Zone::find($ship->zone); //6
                // dd($z->name);
                $ship->zone = $z->name;
                // dd($ship->zone );
            }

            foreach($shipments as $ship)
            {
                // dd($ship->service_mode);
                $z = service_mode::find($ship->service_mode); //6
                // dd($z);
                $ship->service_mode = $z->service_mode;
                // dd($ship);
            }

            foreach($shipments as $ship)
            {
                // dd($ship->service_mode);
                // $z = service_mode::find($ship->service_mode); //6
                // dd($z);
                // $ship->service_mode = $z->service_mode;
                // dd($ship);
                // dd('h');
                // $ship->POD === '7';
                // $ship->POD === 6;
                // $ship->POD = 'N';

                // dd($ship->POD);
                
                if($ship->POD == 1)
                {
                    // dd('hi');
                    $ship->POD = 'Y';
                }
                elseif($ship->POD == 0)
                {
                    $ship->POD = 'N';
                }

                // dd($ship);
            }

            
            // dd($shipments);
            return $shipments;
        }
        else
        {
            dd('No Records Found');
        }
    }
}
