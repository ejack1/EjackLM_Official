@extends('layout.main')

@section('title')
    <title>Social Settings</title>
@endsection
@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >SMTP Settings</h1>
<div class="accordion">
    <form action="{{url('mainsettings.Smtp_config_update')}}" method="post" enctype="multipart/form-data">
    @csrf


    <div style="width: 40%;margin: auto; text-align: center;">

        <div class="mt-3">
            <p>Mail on/off:</p>
    
            @if($smtp->availability == 0)
                <input type="radio" id="html" name="availability" value="0" checked>
                <label for="html">Off</label><br>
                <input type="radio" id="css" name="availability" value="1">
                <label for="css">On</label><br>
            @else
                <input type="radio" id="html" name="availability" value="0">
                <label for="html">Off</label><br>
                <input type="radio" id="css" name="availability" value="1" checked>
                <label for="css">On</label><br>
            @endif
    
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Port</label>
            <input id="name" type="text" name="port" value="{{$smtp->port}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Secure</label>
            <input id="name" type="text" name="secure" value="{{$smtp->secure}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Host</label>
            <input id="name" type="text" name="host" value="{{$smtp->host}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Username</label>
            <input id="name" type="text" name="username" value="{{$smtp->username}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Password</label>
            <input id="name" type="password" name="password" value="{{$smtp->password}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
    
        <button type="submit" class="button bg-theme-1 text-white mt-5">Apply Changes</button>

    </div>
    

    </form>
</div>
@endsection
