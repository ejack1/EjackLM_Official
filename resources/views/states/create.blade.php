@extends('layout.main')

@section('title')
    <title>Add states</title>
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
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Branch</h1>
<div class="accordion">
    <form action="{{route('states.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="state_name" class="form-label" >Name</label>
        <input id="state_name" type="text" name="state_name" required class="input w-full border mt-2" placeholder="name">
    </div>

    <div class="sm:mt-2">
        <label for="Country_id" class="form-label" >Country</label>
       <select class="input w-full border mt-2" name="country_id" required>
           @foreach ($countries as  $country)
           <option value="{{$country->id}}">{{$country->country_name}}</option>
           @endforeach
    </select>
    </div>



    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
