@extends('layout.main')

@section('title')
    <title>Settings</title>
@endsection
@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Settings</h1>
<div class="accordion">
    <form action="{{url('mainsettings.applychanges')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container" style="display: inline-flex;">
        <div style=" width: 40%;   margin: inherit; text-align: center;">



            <h1 class="heading text-center" style="font-size: 20px;margin:15px;"><b>Credentials</b></h1>

            <div class="mt-3">
                <label for="name" class="form-label">Username</label>
                <input id="name" type="text" value="{{auth()->user()->name}}" name="name" class="input w-full border mt-2" placeholder="name">
            </div>
            <div class="mt-3">
                <label for="company" class="form-label">password</label>
                <input id="company" type="text" value="" name="password" class="input w-full border mt-2" placeholder="company">
            </div>
            
            <h1 class="heading text-center" style="font-size: 20px;margin:15px;"><b>Company Info</b></h1>

            <div class="mt-3">
                <label for="email" class="form-label">Company Name</label>
                <input id="email" value="{{$company_info->company_name}}" type="text" name="company_name" class="input w-full border mt-2" placeholder="email">
            </div>

            <div class="mt-3">
                <label for="phone" class="form-label">Company Address</label>
                <input id="phone" value="{{$company_info->company_address}}" type="text" name="company_address" class="input w-full border mt-2" placeholder="Company Address">
            </div>

            <div class="mt-3">
                <label for="city" class="form-label">Company Phone</label>
                <input id="city" value="{{$company_info->company_phone}}" type="text" name="company_phone" class="input w-full border mt-2" placeholder="city">
            </div>

            <div class="mt-3">
                <label for="city" class="form-label">Company Vat</label>
                <input id="city" value="{{$company_info->company_vat}}" type="text" name="company_vat" class="input w-full border mt-2" placeholder="city">
            </div>

            <div class="mt-3">
                <label for="city" class="form-label">Company Email</label>
                <input id="city" value="{{$company_info->company_email}}" type="text" name="company_email" class="input w-full border mt-2" placeholder="city">
            </div>




        </div>
        <div style="width: 40%;margin: auto; text-align: center;">
            


            <h1 class="heading text-center" style="font-size: 20px;margin:15px;"><b>Other Settings</b></h1>

            {{-- <div class="mt-3">
                <label for="address" class="form-label">Set Default Time Zone</label>
                <input id="address" type="text" name="address" class="input w-full border mt-2" placeholder="addresss">
            </div> --}}
        
            <div class="sm:mt-2">
                <label for="Country_id" class="form-label" >Set Default Time Zone</label>
               <select class="input w-full border mt-2" name="time_zone" required>
                <option value="{{$time_zone_selected->id}}">{{$time_zone_selected->timezone}}</option>
                   @foreach ($time_zones as  $timez)
                   <option value="{{$timez->id}}">{{$timez->timezone}}</option>
                   @endforeach
            </select>
            </div>
        
            <div class="mt-3">
                <label for="address" class="form-label">Page Rows</label>
                <input id="address" value="{{$setting->page_row}}" type="text" name="page_row" class="input w-full border mt-2" placeholder="addresss">
            </div>
        
            <div class="mt-3">
                <label for="address" class="form-label">Set Default Vat %</label>
                <input id="address" value="{{$setting->default_vat}}" type="text" name="default_vat" class="input w-full border mt-2" placeholder="addresss">
            </div>
        
            <div class="sm:mt-2">
                <label for="Country_id" class="form-label" >Set Default Country</label>
               <select class="input w-full border mt-2" name="default_country_id" required>
                <option value="{{$country->id}}">{{$country->country_name}}</option>
                   @foreach ($countries as  $c)
                   <option value="{{$c->id}}">{{$c->country_name}}</option>
                   @endforeach
            </select>
            </div>
        
            {{-- <div class="sm:mt-2">
                <label for="Country_id" class="form-label" >Set Default Country</label>
               <select class="input w-full border mt-2" value="{{$setting->curreny}}" name="currency" required>
        
                <option value="{{$currency->currency}}">{{$currency->currency}}</option>
                   @foreach ($currencies as  $c)
                   <option value="{{$c->id}}">{{$c->currency}}</option>
                   @endforeach
            </select>
            </div> --}}
        
            <div class="mt-3">
                <label for="address" class="form-label">Set Default Invoice number</label>
                <input id="address" value="{{$setting->invoice_number}}" type="text" name="invoice_number" class="input w-full border mt-2" placeholder="addresss">
            </div>
        
        
            <div class="mt-3">
                <label for="address" class="form-label">Set Default AWB Number</label>
                <input id="address" value="{{$setting->awb_number}}" type="text" name="awb_number" class="input w-full border mt-2" placeholder="addresss">
            </div>
        
            <div class="mt-3">
                <label for="address" class="form-label">AWB Format</label>
                <input id="address" value="{{$setting->awb_format}}" type="text" name="awb_format" class="input w-full border mt-2" placeholder="addresss">
            </div>
        
            <div class="mt-3">
                <label for="address" class="form-label">Admin Charset</label>
                <input id="address" value="{{$setting->admin_charset}}" type="text" name="admin_charset" class="input w-full border mt-2" placeholder="addresss">
            </div>
        
            <div class="mt-3">
                <label for="address" class="form-label">Front Charset</label>
                <input id="address" value="{{$setting->front_charset}}" type="text" name="front_charset" class="input w-full border mt-2" placeholder="addresss">
            </div>
        
            <div class="sm:mt-2">
                <label for="Country_id" class="form-label" >Set Default Currency</label>
               <select class="input w-full border mt-2" value="{{$setting->curreny}}" name="currency" required>
                   @foreach ($currencies as  $c)
                   <option value="{{$c->id}}">{{$c->currency}}</option>
                   @endforeach
            </select>
            </div>
        
            <div class="mt-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image"  class="input w-full border mt-2" placeholder="Image">
                @error('image')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>



        </div>
    </div>


    <div style="width: 40%;margin: auto; text-align: center;">
        <button type="submit" class="button bg-theme-1 text-white mt-5">Apply Changes</button>
    </div>

    
    

    </form>
</div>
@endsection
