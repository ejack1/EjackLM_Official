@extends('layout.main')

@section('title')
    <title>Social Settings</title>
@endsection
@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Social Settings</h1>
<div class="accordion">
    <form action="{{url('mainsettings.applySocialchanges')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div style="width: 40%;margin: auto; text-align: center;">
        <div class="mt-3">
            <label for="name" class="form-label">Facebook</label>
            <input id="name" type="text" name="fb" value="{{$social->fb}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Instagram</label>
            <input id="name" type="text" name="in" value="{{$social->insta}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Twitter</label>
            <input id="name" type="text" name="tw" value="{{$social->twitter}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <div class="mt-3">
            <label for="name" class="form-label">Youtube</label>
            <input id="name" type="text" name="yt" value="{{$social->yt}}" class="input w-full border mt-2" placeholder="name">
        </div>
    
        <button type="submit" class="button bg-theme-1 text-white mt-5">Apply Changes</button>
    </div>

    

    </form>
</div>
@endsection
