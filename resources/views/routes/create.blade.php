@extends('layout.main')

@section('title')
    <title>Add Routes</title>
@endsection
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Route</h1>
<div class="accordion">
    <form action="{{route('routes.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="routename" class="form-label">Route</label>
        <input id="routename" type="text" name="routename" class="input w-full border mt-2" placeholder="name">
    </div>
    <div class="sm:mt-2">
        <label for="Country_id" class="form-label" >Country</label>
       <select class="input w-full border mt-2" name="country_id" required>
           @foreach ($countries as  $country)
           <option value="{{$country->id}}">{{$country->country_name}}</option>
           @endforeach
    </select>
    </div>

    <div class="sm:mt-2">
        <label for="Country_id" class="form-label" >city</label>
       <select class="input w-full border mt-2" name="city_id" required>
           @foreach ($cities as  $city)
           <option value="{{$city->id}}">{{$city->name}}</option>
           @endforeach
    </select>
    </div>

    <div class="mt-3">
        <label for="keywords" class="form-label">keywords</label>
        <input id="keywords" type="text" name="keywords" class="input w-full border mt-2" placeholder="keywords">
    </div>



    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
