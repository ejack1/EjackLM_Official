@extends('layout.main')

@section('title')
    <title>Delivered Shipments</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Delivered Shipments</h1>
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{url('shipments.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Shipment</a>

</div>






<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap"> ID </th>
                 <th class="whitespace-nowrap"> date</th>
                 <th class="whitespace-nowrap"> Reference#</th>

                 <th class="whitespace-nowrap"> Shipper Reference#</th>

                 <th class="whitespace-nowrap"> AWB##</th>

                 <th class="whitespace-nowrap"> Delivery Attempts </th>
                 <th class="whitespace-nowrap"> Call Attempts </th>
                 <th class="whitespace-nowrap"> Origin </th>
                 <th class="whitespace-nowrap"> Destination </th>
                 <th class="whitespace-nowrap"> Pieces </th>
                 <th class="whitespace-nowrap"> Sender </th>
                 <th class="whitespace-nowrap"> Second Sender Name </th>
                 <th class="whitespace-nowrap"> Reciever </th>

                 <th class="whitespace-nowrap"> Forward Through </th>

                 <th class="whitespace-nowrap"> Airway Bill No. </th>

                 <th class="whitespace-nowrap"> Status </th>

                 <th class="whitespace-nowrap"> Pay Status </th>

                 <th class="whitespace-nowrap"> Payable Status </th>
                 <th class="whitespace-nowrap"> Receivable Status </th>
                 <th class="whitespace-nowrap"> Schedule </th>

                 <th class="whitespace-nowrap"> Schedule Chanel </th>
                 <th class="whitespace-nowrap"> On Hold </th>
                 <th class="whitespace-nowrap"> On Hold Reason </th>
                 <th class="whitespace-nowrap"> On Hold Date </th>
                 <th class="whitespace-nowrap"> On Hold Confirm </th>
                 <th class="whitespace-nowrap"> On Hold Days </th>
                 <th class="whitespace-nowrap"> Driver Name </th>
                 <th class="whitespace-nowrap"> Driver Comment </th>
                 <th class="whitespace-nowrap"> Details </th>

                 <th class="whitespace-nowrap"> Driver Supplier </th>
                 <th class="whitespace-nowrap"> Warehouse </th>
                 <th class="whitespace-nowrap"> Shelve </th>
                 <th class="whitespace-nowrap"> Schedule Date </th>
                 <th class="whitespace-nowrap"> Weight </th>

                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ( $shipments as $t  )
            <tr>

                <td>{{$t->id}}</td>
                {{-- <td>{{$t->created}}</td> --}}
                <td>{{Carbon\Carbon::parse($t->created)->format("D M j G:i:s T Y")}}</td>
                <td>{{$t->reference}}</td>
                <td>{{$t->shipper_reference}}</td>
                <td>{{$t->AWB}}</td>
                <td>{{$t->Delivery_Attempts}}</td>
                <td>{{$t->Call_Attempts}}</td>

                {{-- <td>{{$t->sender_shipment_city}}</td> --}}

                {{-- <td>{{ $t->city->where('id',$t->sender_shipment_city) }}</td> --}}
                <td>{{ $t->city[0]->name }} </td>

                {{-- <td>{{ $t->city->name }} </td> --}}



                <td>{{$t->r_city[0]->name}}</td>
                {{-- <td>{{$t->receiver_shipment_city}}</td> --}}
                
                <td>{{$t->pieces}}</td>
                {{-- <td>100000</td> --}}
                <td>{{$t->sender_name}}</td>
                <td>{{$t->second_sender}}</td>
                <td>{{$t->receiver_name}}</td>
                <td>{{$t->forward_through}}</td>
                <td>{{$t->airway_bill_no}}</td>

                {{-- <td>{{$t->status}}</td> --}}
                {{-- shipment_status --}}
                {{-- <td>{{$t->shipment_status[0]->shipment_status_title}}</td> --}}
                <td>{{$t->shipment_status->shipment_status_title}}</td>

                <td>{{$t->pay_status}}</td>
                <td>{{$t->payable_status}}</td>
                <td>{{$t->receivable_status}}</td>

                <td>{{$t->schedule}}</td>
                <td>{{$t->schedule_chanel}}</td>
                <td>{{$t->on_hold}}</td>
                <td>{{$t->on_hold_reason}}</td>
                <td>{{$t->on_hold_date}}</td>
                <td>{{$t->on_hold_confirm}}</td>
                <td>{{$t->on_hold_days}}</td>
                <td>{{$t->driver_name}}</td>
                <td>{{$t->driver_comment}}</td>
                
                {{-- <td>{{$t->details}}</td> --}}



                @if($t->return_to_client_integer == 1)
                    <td>Return To Client</td>
                @else
                    <td>{{$t->details}}</td>
                @endif


                
                <td>{{$t->driver_supplier}}</td>
                <td>{{$t->warehouse}}</td>
                {{-- <td>{{$t->shelve}}</td> --}}
                <td>{{$t->shelve}}</td>
                {{-- <td>{{$t->schedule_date}}</td> --}}
                <td>{{$t->schedule_date}}</td>
                <td>{{$t->Weight}}</td>
                <td>

                    {{-- <a href="{{ url('RPO_detail',$t->id) }}">  
                        <i class="fas fa-info-circle"></i>
                    </a> --}}

                    <a href="{{ url('shipment_update',$t->id) }}">  
                        <i class="far fa-plus-square"></i>
                    </a>
                    
                    <a href="{{ url('shipment_delete',$t->id) }}">  
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                </td>

            </tr>
            @endforeach

            {{-- dark:bg-dark-1  --}}
            {{-- Pagination --}}

        <div class="d-flex justify-content-center">
            {!! $shipments->links() !!}
        </div>

        </tbody>
    </table>
</div>
@endsection
