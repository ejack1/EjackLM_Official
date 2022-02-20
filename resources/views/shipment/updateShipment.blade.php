@extends('layout.main')

@section('title')
    <title>Update Shipment</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Update Shipment</h1>
{{-- <div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('users.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Staff</a>

</div> --}}
{{-- <div class="search hidden sm:block">
    <input type="text" class="search__input input placeholder-theme-13" placeholder="Search..." style="text-align: center;">
    <i data-feather="search" class="search__icon dark:text-gray-300"></i>
</div>
<a class="notification sm:hidden" href=""> <i data-feather="search"
        class="notification__icon dark:text-gray-300"></i> </a> --}}

<div class="overflow-x-auto">

    <div class="accordion">
        <form action="{{url('shipments.updated')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- <div class="mt-3">
            <label for="name" class="form-label">wewe</label>
            <input id="name" type="text" name="wewe" class="input w-full border mt-2" placeholder="">
        </div> --}}




        <div class="container" style="display: inline-flex;">
            <div class="col-sm-8"  style="    margin: auto; text-align: center;">

                <h1 class="" style="font-size:20px;margin:15px;">Reference Info</h1>
                <div class="mt-3">
                    <label for="name" class="form-label"></label>
                    <input id="name" type="hidden" value="{{$shipment->id}}" name="shipment_id" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>


                <div class="mt-3">
                    <label for="name" class="form-label">AWB Number</label>
                    <input id="name" type="text" value="{{$shipment->AWB}} "name="AWB" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Shipper Reference</label>
                    <input id="name" type="text" value="{{$shipment->shipper_reference}}" name="shipper_reference" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Return To Client</label>
                        <select  id="country-dd" name="return_to_client_integer" value="{{$shipment->return_to_client_integer}}" class="input w-full border mt-2" style="text-align: center;">

                            @if($shipment->return_to_client_integer == "0")   
                                <option value="0">Not Return To Client</option>
                                <option value="1">Return to Client</option>
                            @elseif($shipment->return_to_client_integer == "1")
                                <option value="1">Return To Client</option>
                                <option value="0">Not Return to Client</option>
                            @endif
                            {{-- <option value="0">Product Type</option> --}}
                            
                            
                        </select>
                        </select>
                    </div>
                </div>

            </div>
            <div class="col-sm-8"  style="    margin: auto; text-align: center;">
                


                <h1 class="" style="font-size:20px;margin:15px;">Shipment Type</h1>

                {{-- @if($shipment->product_type == "Parcel")
                @endif --}}
                
                {{-- {{dd($shipment->product_type)}} --}}
                
        
                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Product Type</label>
                        <select  id="country-dd" name="product_type" value={{$shipment->product_type}} class="input w-full border mt-2" style="text-align: center;">
        
                            @if($shipment->product_type == "Parcel")
                                <option value="Parcel">Parcel</option>
                                <option value="International GOLF">International GOLF</option>
                            @elseif($shipment->product_type == "International GOLF")
                                <option value="International GOLF">International GOLF</option>
                                <option value="Parcel">Parcel</option>
                            @endif
                            {{-- <option value="0">Product Type</option> --}}
                            
                            
                        </select>
                        </select>
                    </div>
                </div>
        
                {{-- <h1></h1> --}}
        
                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Payment Mode</label>
                        <select  id="country-dd" name="payment_mode" value="payment_mode" class="input w-full border mt-2" style="text-align: center;">
                            {{-- <option value="">Select Payment Mode</option> --}}
                            <option value="{{$shipment->payment_mode}}">{{$shipment->paymentMode->payment_mode}}</option>
                            @foreach ($paymode as $data)
        
                                @if($shipment->payment_mode != $data->id)
                                    <option value="{{$data->id}}">
                                        {{$data->payment_mode}}
                                    </option>
                                @endif
                                
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>


            </div>
            <div class="col-sm-8"  style="    margin: auto; text-align: center;">
                


                <h1 class="" style="font-size:20px;margin:15px;">Account Info</h1>
                <div class="mt-3">
                    <label for="name" class="form-label">Account Number</label>
                    <input id="name" type="text" value="{{$shipment->account_number}}" name="account_number" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>


            </div>
        </div>


        <div class="container" style="display: inline-flex;margin-top: 22px;">
            <div style="margin: auto;width: 35%;">


                <h1 class="" style="font-size:20px;margin:15px;">Sender Info</h1>

                <div class="mt-3">
                    <label for="name" class="form-label">Sender Name</label>
                    <input id="name" type="text"  value="{{$shipment->sender_name}}" name="sender_name" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Country</label>
                        <select  id="country-dd"  value="{{$shipment->sender_shipment_country}}" name="sender_shipment_country" class="input w-full border mt-2" style="text-align: center;" >
                            {{-- <option value="">Select Country</option> --}}
                            <option value="{{$shipment->country[0]->id}}">{{$shipment->country[0]->country_name}}</option>
                            @foreach ($countries as $data)
                                <option value="{{$data->id}}">
                                    {{$data->country_name}}
                                </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">City</label>
                        <select  id="country-dd" value="{{$shipment->sender_shipment_city}}" name="sender_shipment_city" class="input w-full border mt-2" style="text-align: center;" >
                            <option value="{{$shipment->city[0]->id}}">{{$shipment->city[0]->name}}</option>
                                @foreach ($city as $data)
                                    <option value="{{$data->id}}">
                                        {{$data->name}}
                                    </option>
                                @endforeach
                        </select>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">City Code</label>
                    <input id="name" type="text" value="{{$shipment->sender_city_code}}" name="sender_city_code" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Address</label>
                    <textarea class="input w-full border mt-2" value="" name="sender_address"  id="" cols="30" rows="10" style="text-align: center;">{{$shipment->sender_address}}</textarea>
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Mobile</label>
                    <input id="name" type="text" value="{{$shipment->sender_mobile}}" name="sender_mobile" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Email</label>
                    <input id="name" type="text" value="{{$shipment->sender_email}}" name="sender_email" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">ID</label>
                    <input id="name" type="text" value="{{$shipment->sender_id}}" name="sender_id" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                {{-- @error('unique_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}


            </div>

            <div style="margin: auto;width: 35%;">

                <h1 class="" style="font-size:20px;margin:15px;">Receiver Info</h1>


                <div class="mt-3">
                    <label for="name" class="form-label">Receiver Name</label>
                    <input id="name" type="text"  value="{{$shipment->receiver_name}}" name="receiver_name" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Country</label>
                        <select  id="country-dd" name="receiver_shipment_country" value="receiver_shipment_country" class="input w-full border mt-2" style="text-align: center;" >
                            {{-- <option value="">Select Country</option> --}}
                            <option value="{{$shipment->r_country[0]->id}}">{{$shipment->r_country[0]->country_name}}</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}">
                                {{$data->country_name}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">City</label>
                        <select  id="country-dd" name="receiver_shipment_city" value="receiver_shipment_city" class="input w-full border mt-2" style="text-align: center;" >
                            {{-- <option value="">Select City</option> --}}
                            <option value="{{$shipment->r_city[0]->id}}">{{$shipment->r_city[0]->name}}</option>
                            @foreach ($city as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">City Code</label>
                    <input id="name" type="text" value="{{$shipment->receiver_city_code}}" name="receiver_city_code" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Address</label>
                    <textarea class="input w-full border mt-2"  value="" name="receiver_address"  id="" cols="30" rows="10" style="text-align: center;">{{$shipment->receiver_address}}</textarea>
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Mobile</label>
                    <input id="name" type="text" value="{{$shipment->receiver_mobile}}" name="receiver_mobile" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Email</label>
                    <input id="name" type="text" value="{{$shipment->receiver_email}}" name="receiver_email" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Shipment Zone Information</label>
                        <select  id="country-dd" name="zone" value="zone" class="input w-full border mt-2" style="text-align: center;">
                            <option value="{{$shipment->ship_zone->id}}">{{$shipment->ship_zone->name}}</option>
                            @foreach ($zones as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
                @error('zone')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
        </div>



        <div class="container" style="display: inline-flex;">
            <div style="margin: auto; text-align: center; ">

                <h1 class="" style="font-size:20px;margin:15px;">Additional Info</h1>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Status</label>
                        <select  id="country-dd" name="status" value="status" class="input w-full border mt-2" style="text-align: center;" >
                            {{-- <option value="">Select Status</option> --}}
                            <option value="{{$shipment->shipment_status->id}}">{{$shipment->shipment_status->shipment_status_title}}</option>

                            @foreach ($status as $data)
                            <option value="{{$data->id}}">
                                {{$data->shipment_status_title}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Parcel</label>
                    <input id="name" type="text" value="{{$shipment->parcel}}" name="parcel" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Length</label>
                    <input id="name" type="text" value="{{$shipment->length}}" name="length" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Width</label>
                    <input id="name" type="text" value="{{$shipment->width}}" name="width" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Height</label>
                    <input id="name" type="text" value="{{$shipment->height}}" name="height" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Weight(KG)</label>
                    <input id="name" type="text" value="{{$shipment->Weight}}" name="Weight" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>
                
            </div>

            <div style="margin: auto; text-align: center; padding: 48px;">

                <h1 class="" style="font-size:20px;margin:15px;">Service and Payment Info</h1>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Service Mode</label>
                        <select  id="country-dd" name="service_mode" value="service_mode" class="input w-full border mt-2" style="text-align: center;" >
                            {{-- <option value="">Select Service Mode</option> --}}
                            <option value="{{$shipment->serviceMode->id}}">{{$shipment->serviceMode->service_mode}}</option>
        
                            @foreach ($service_mode as $data)
                            <option value="{{$data->id}}">
                                {{$data->service_mode}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">Shipment Value</label>
                    <input id="name" type="text" value="{{$shipment->shipment_value}}" name="shipment_value" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>
                
                <div class="mt-3">
                    <label for="name" class="form-label">Description</label>
                    <textarea class="input w-full border mt-2"  name="description"  id="" cols="30" rows="10" style="text-align: center;"> {{$shipment->description}}</textarea>
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">SKU</label>
                    <input id="name" type="text" value="{{$shipment->SKU}}" name="SKU" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>
        

            </div>

            <div style="margin: auto; text-align: center;">

                <h1 class="" style="font-size:20px;margin:15px;">Payment Details</h1>

                <div class="mt-3">
                    <label for="name" class="form-label">Delivery Charge(SAR)</label>
                    <input id="name" type="text" value="{{$shipment->delivery_charge}}" name="delivery_charge" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">COD Charge(SAR)</label>
                    <input id="name" type="text" value="{{$shipment->cod_charge}}" name="cod_charge" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">Additional Charge</label>
                    <input id="name" type="text" value="{{$shipment->additional_charge}}" name="additional_charge" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">Total Charge(SAR)</label>
                    <input id="name" type="text" value="{{$shipment->total_charge}}" name="total_charge" class="input w-full border mt-2" placeholder="" style="text-align: center;">
                </div>


                <h1 class="" style="font-size:20px;margin:15px; padding: 48px;">Other Details</h1>
                <div class="mt-3">
                    <p>POD (Y/N):</p>

                    {{-- <input type="radio" id="html" name="pod" value="0" checked>
                        <label for="html">No</label><br>
                        <input type="radio" id="css" name="pod" value="1">
                        <label for="css">Yes</label><br>
                         --}}
                    @if($shipment->POD === '1')
                    {{-- <h1>no yes</h1> --}}
                        <input type="radio" id="html" name="pod" value="1" checked>
                        <label for="html">Yes</label><br>

                        <input type="radio" id="css" name="pod" value="0" >
                        <label for="css">No</label><br>
                        
                    @elseif($shipment->POD == 0)
                        <input type="radio" id="html" name="pod" value="0" checked >
                        <label for="html">No</label><br>

                        <input type="radio" id="css" name="pod" value="1" >
                        <label for="css">Yes</label><br>
                    {{-- <h1>NO checked</h1> --}}
                    {{-- @else
                        <h1> Nothing </h1>
                         --}}
                    @endif
            
                </div>


            </div>



        </div>


        <div class="container" style="    text-align: center;
    font-size: 20px;
    margin-top: 20px;">
<button type="submit" class="button bg-theme-1 text-white mt-5">Update Shipment</button>
        </div>








       

       


        



        
        


        

        

        

       

        
    
        </form>
    </div>

</div>
@endsection