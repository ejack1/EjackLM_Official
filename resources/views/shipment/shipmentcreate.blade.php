@extends('layout.main')

@section('title')
    <title>Create Shipment</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Create Shipment</h1>
{{-- <div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('users.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Staff</a>

</div> --}}
{{-- <div class="search hidden sm:block">
    <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
    <i data-feather="search" class="search__icon dark:text-gray-300"></i>
</div>
<a class="notification sm:hidden" href=""> <i data-feather="search"
        class="notification__icon dark:text-gray-300"></i> </a> --}}

<div class="overflow-x-auto">

    <div class="accordion">
        <form action="{{url('shipments.store')}}" method="post" enctype="multipart/form-data">
        @csrf







        <div class="container" style="display: inline-flex;">

            <div class="col-sm-8"  style="    margin: auto; text-align: center;">
                <h1 class="" style="font-size:20px;margin:15px;">Reference Info</h1>

                <div class="mt-3">
                    <label for="AWB" class="form-label">AWB Number</label>
                    <input id="AWB" type="text" name="AWB" class="input border mt-2" placeholder="">
                </div>
                @error('AWB')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror
    
                <div class="mt-3">
                    <label for="Reference" class="form-label">Shipper Reference</label>
                    <input id="Reference" type="text" name="shipper_reference" class="input border mt-2" placeholder="">
                </div>
            </div>

            <div class="col-sm-4" style="    margin: auto; text-align: center;">
                

                <h1 class="" style="font-size:20px;margin:15px;">Shipment Type</h1>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="Product" class="form-label">Product Type</label>
                        <select  id="Product" name="product_type" value="product_type" class="input border mt-2"style="text-align: center;">
                            <option value="0">Product Type</option>
                            <option value="Parcel">Parcel</option>
                            <option value="International GOLF">International GOLF</option>
                        </select>
                        </select>
                    </div>
                </div>
                @error('product_type')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="payment_mode" class="form-label">Payment Mode</label>
                        <select  id="payment_mode" name="payment_mode" value="payment_mode" class="input border mt-2"style="text-align: center;">
                            <option value="">Select Payment Mode</option>
                            @foreach ($paymode as $data)
                            <option value="{{$data->id}}">
                                {{$data->payment_mode}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
                @error('payment_mode')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="col-sm-4" style="    margin: auto; text-align: center;">
                <h1 class="" style="font-size:20px;margin:15px;">Account Info</h1>
                <div class="mt-3">
                    <label for="Account" class="form-label">Account Number</label>
                    <input id="Account" type="text"  name="account_number" class="input border mt-2" placeholder="">
                </div>
            </div>

        </div>
            



        <div class="container" style="display: inline-flex;">

            <div style="margin: auto;width: 35%;margin-top: 72px;">


                <h1 class="heading text-center" style="font-size:20px;margin:15px;">Sender Info</h1>

                <div class="mt-3">
                    <label for="name" class="form-label">Sender Name</label>
                    <input id="name" type="text"  name="sender_name" class="input w-full border mt-2" placeholder="">
                </div>
                @error('sender_name')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Country</label>
                        <select  id="country-dd" name="sender_shipment_country" value="sender_shipment_country" class="input w-full border mt-2" style="text-align: center;">
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}">
                                {{$data->country_name}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
                @error('sender_shipment_country')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">City</label>
                        <select  id="country-dd" name="sender_shipment_city" value="sender_shipment_city" class="input w-full border mt-2" style="text-align: center;">
                            <option value="">Select City</option>
                            @foreach ($city as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
                @error('sender_shipment_city')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mt-3">
                    <label for="name" class="form-label">City Code</label>
                    <input id="name" type="text" name="sender_city_code" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Address</label>
                    <textarea class="input w-full border mt-2"  name="sender_address"  id="" cols="30" rows="10"></textarea>
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Mobile</label>
                    <input id="name" type="text" name="sender_mobile" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Email</label>
                    <input id="name" type="text" name="sender_email" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">ID</label>
                    <input id="name" type="text" name="sender_id" class="input w-full border mt-2" placeholder="">
                </div>              



            </div>


            <div style="margin: auto;width: 35%;">


                <h1 class="heading text-center" style="font-size:20px;margin:15px;">Receiver Info</h1>


                <div class="mt-3">
                    <label for="name" class="form-label">Receiver Name</label>
                    <input id="name" type="text"  name="receiver_name" class="input w-full border mt-2" placeholder="">
                </div>
                @error('receiver_name')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror
        
                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Country</label>
                        <select  id="country-dd" name="receiver_shipment_country" value="receiver_shipment_country" class="input w-full border mt-2" style="text-align: center;">
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}">
                                {{$data->country_name}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
                @error('receiver_shipment_country')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror
        
                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">City</label>
                        <select  id="country-dd" name="receiver_shipment_city" value="receiver_shipment_city" class="input w-full border mt-2"style="text-align: center;">
                            <option value="">Select City</option>
                            @foreach ($city as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
                @error('receiver_shipment_city')
                <div style="color:red;" class="alert alert-danger">{{ $message }}</div>
                @enderror
        
                <div class="mt-3">
                    <label for="name" class="form-label">City Code</label>
                    <input id="name" type="text" name="receiver_city_code" class="input w-full border mt-2" placeholder="">
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">Address</label>
                    <textarea class="input w-full border mt-2"  name="receiver_address"  id="" cols="30" rows="10"></textarea>
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">Mobile</label>
                    <input id="name" type="text" name="receiver_mobile" class="input w-full border mt-2" placeholder="">
                </div>
        
                <div class="mt-3">
                    <label for="name" class="form-label">Email</label>
                    <input id="name" type="text" name="receiver_email" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Shipment Zone Information</label>
                        <select  id="country-dd" name="zone" value="zone" class="input w-full border mt-2" style="text-align: center;">
                            <option value="">Select Zone</option>
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

        {{-- @error('unique_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
        






        <div class="container" style="display: inline-flex;">


            <div style="margin: auto; text-align: center; ">



                <h1 class="" style="font-size:20px;margin:15px; padding: 48px;">Additional Info</h1>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Status</label>
                        <select  id="country-dd" name="status" value="status" class="input w-full border mt-2" style="text-align: center;">
                            <option value="">Select Status</option>
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
                    <input id="name" type="text" name="parcel" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Length</label>
                    <input id="name" type="text" name="length" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Width</label>
                    <input id="name" type="text" name="width" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Height</label>
                    <input id="name" type="text" name="height" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Weight(KG)</label>
                    <input id="name" type="text" name="Weight" class="input w-full border mt-2" placeholder="">
                </div>      



            </div>
            {{-- border: 2px solid #1c3faa;
            border: 2px solid #1c3faa;
            border: 2px solid #1c3faa; --}}
            <div style="margin: auto; text-align: center; padding: 48px;">


                <h1 class="" style="font-size:20px;margin:15px;">Service and Payment Info</h1>

                <div class="sm:mt-2">
                    <div class="form-group">
                        <label for="city_id" class="form-label">Service Mode</label>
                        <select  id="country-dd" name="service_mode" value="service_mode" class="input w-full border mt-2" style="text-align: center;">
                            <option value="">Select Service Mode</option>
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
                    <input id="name" type="text" name="shipment_value" class="input w-full border mt-2" placeholder="">
                </div>
                
                <div class="mt-3">
                    <label for="name" class="form-label">Description</label>
                    {{-- <input id="name" type="text" name="sender_address" class="input w-full border mt-2" placeholder=""> --}}
                    <textarea class="input w-full border mt-2"  name="description"  id="" cols="30" rows="10"></textarea>
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">SKU</label>
                    <input id="name" type="text" name="SKU" class="input w-full border mt-2" placeholder="">
                </div>



            </div>


            <div style="margin: auto; text-align: center;">


                <h1 class="" style="font-size:20px;margin:15px; padding: 48px;">Payment Details</h1>

                <div class="mt-3">
                    <label for="name" class="form-label">Delivery Charge(SAR)</label>
                    <input id="name" type="text" name="delivery_charge" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">COD Charge(SAR)</label>
                    <input id="name" type="text" name="cod_charge" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Additional Charge</label>
                    <input id="name" type="text" name="additional_charge" class="input w-full border mt-2" placeholder="">
                </div>

                <div class="mt-3">
                    <label for="name" class="form-label">Total Charge(SAR)</label>
                    <input id="name" type="text" name="total_charge" class="input w-full border mt-2" placeholder="">
                </div>

                <h1 class="" style="font-size:20px;margin:15px; padding: 48px;">Other Details</h1>
                <div class="mt-3">
                    <p>POD (Y/N):</p>

                    <input type="radio" id="html" name="pod" value="0" checked>
                        <label for="html">No</label><br>
                        <input type="radio" id="css" name="pod" value="1">
                        <label for="css">Yes</label><br>
                        
                    {{-- @if($shipment->availability == 0)
                        <input type="radio" id="html" name="availability" value="0" checked>
                        <label for="html">Off</label><br>
                        <input type="radio" id="css" name="availability" value="1">
                        <label for="css">On</label><br>
                    @else
                        <input type="radio" id="html" name="availability" value="0">
                        <label for="html">Off</label><br>
                        <input type="radio" id="css" name="availability" value="1" checked>
                        <label for="css">On</label><br>
                    @endif --}}
            
                </div>


            </div>


        </div>





        <div class="container" style="    text-align: center;
    font-size: 20px;
    margin-top: 20px;">
            <button type="submit" class="button bg-theme-1 text-white mt-5">Add Shipment</button>
        </div>








        

        

        


        
        
    
        </form>
    </div>

</div>
@endsection