@extends('layout.main')

@section('title')
    <title>Edit Route</title>
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
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('routes.index')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Back</a>

</div>
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Route</h1>
<div class="accordion">
    <form action="{{ route('routes.update',$route->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label for="routename" class="form-label">Route</label>
            <input id="routename" type="text" value="{{$route->routename}}" name="routename" class="input w-full border mt-2" placeholder="name">
        </div>
        <div class="mt-3">
            <label for="country" class="form-label">Country</label>
            <input id="country" type="text" value="{{$route->country}}" value="Saudi Arabia" name="country" class="input w-full border mt-2" placeholder="country">
        </div>
        <div class="mt-3">
            <label for="city" class="form-label">City</label>
            <input id="city" type="text" name="city" value="{{$route->city}}" class="input w-full border mt-2" placeholder="city">
        </div>

        <div class="mt-3">
            <label for="keywords" class="form-label">keywords</label>
            <input id="keywords" type="text"  value="{{$route->z}}"  name="keywords" class="input w-full border mt-2" placeholder="keywords">
        </div>




    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
