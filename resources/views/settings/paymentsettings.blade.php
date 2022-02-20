@extends('layout.main')

@section('title')
    <title>Payment Settings</title>
@endsection
@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Payment Settings</h1>
<div class="accordion">
    <form action="{{url('mainsettings.paymentsettingUpdate')}}" method="post" enctype="multipart/form-data">
    @csrf



    <div style="width: 40%;margin: auto; text-align: center;">
        <div class="mt-3">
            <p>Paypal :</p>
            @if($payment->paypal_availability == 0)
                <input type="radio" id="html" name="paypal_availability" value="0" checked>
                <label for="html">Off</label><br>
                <input type="radio" id="css" name="paypal_availability" value="1">
                <label for="css">On</label><br>
            @else
                <input type="radio" id="html" name="paypal_availability" value="0" >
                <label for="html">Off</label><br>
                <input type="radio" id="css" name="paypal_availability" value="1" checked>
                <label for="css">On</label><br>
            @endif
            
    
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Paypal Email</label>
            <input id="name" type="text" name="paypal_email" value="{{$payment->paypal_email}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <p>Wire Transfer :</p>
            @if($payment->wire_availability == 0)
                <input type="radio" id="html" name="wire_availability" value="0" checked> 
                <label for="html">Off</label><br>
                <input type="radio" id="css" name="wire_availability" value="1" >
                <label for="css">On</label><br>
            @else
                <input type="radio" id="html" name="wire_availability" value="0">
                <label for="html">Off</label><br>
                <input type="radio" id="css" name="wire_availability" value="1" checked>
                <label for="css">On</label><br>
            @endif
    
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Wire Transfer Details:</label>
            {{-- <input id="name" type="text" name="port" value="{{$smtp->port}}" class="input w-full border mt-2" placeholder="name"> --}}
            <textarea class="input w-full border mt-2" name="wire_details" value="{{$payment->wire_details}}" id="" cols="30" rows="10">{{$payment->wire_details}}</textarea>
        </div>
    
    
        <button type="submit" class="button bg-theme-1 text-white mt-5">Apply Changes</button>
    </div>

   

    </form>
</div>
@endsection
