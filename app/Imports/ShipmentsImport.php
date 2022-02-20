<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Country;
use App\Models\service_mode;
use App\Models\Shipment;
use App\Models\Zone;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShipmentsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);

        $service = $row['service_mode'];
        $s      = service_mode::where('service_mode','like','%'.$service.'%')->get();
        $row['service_mode'] = $s[0]->id;

        $origin = $row['origin'];
        $s      = City::where('name','like','%'.$origin.'%')->get();
        // dd($s);
        $row['origin'] = $s[0]->id;

        // $destination = $row['destination'];
        // // $s      = Country::where('country_name','like','%'.$destination.'%')->get();
        // $s = Country::where('country_name','like','%'.$destination.'%')->get();
        // dd($s);
        // // $row['destination'] = $s[0]->id;

        // dd($row['destination']);

        $destination = $row['destination'];
        $s      = City::where('name','like','%'.$destination.'%')->get();
        // dd($s);
        $row['destination'] = $s[0]->id;

        $zone = $row['zone'];
        $s      = Zone::where('name','like','%'.$zone.'%')->get();
        // dd($s);
        $row['zone'] = $s[0]->id;


        // $shipments = shipment::where('reference','like','%'.$request->search_query.'%')->orderBy('id')->paginate(5);

        return new Shipment([
            'reference'     => $row['reference'],
            'shipper_reference'    => $row['shipper_reference'], 
            'Weight'    => $row['weight'], 

            'Booking_Mode'    => $row['booking_mode'], 

            'product_type'    => $row['product_type'], 


            'sender_shipment_city'    => $row['origin'], 
            'receiver_shipment_city'    => $row['destination'], 

            'sender_name'    => $row['sender_name'], 
            'sender_address'    => $row['sender_address'], 
            'sender_mobile'    => $row['sender_mobile'], 
            'sender_email'    => $row['sender_email'], 

            'description'     => $row['description'],


            'cod_charge'    => $row['cod_charge'], 




            'service_mode'    => $row['service_mode'], 

            'shipment_value'    => $row['shipment_value'], 

            'POD'    => $row['pod'], 

            'account_number'    => $row['account_number'], 

            'zone'     => $row['zone'],

        ]);
    }
}
