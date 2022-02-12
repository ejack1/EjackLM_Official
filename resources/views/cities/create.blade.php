@extends('layout.main')

@section('title')
    <title>Add City</title>
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
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Add City</h1>
<div class="accordion">
    <form action="{{route('cities.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" required class="input w-full border mt-2" placeholder="name">
    </div>
    <div class="sm:mt-2">
        <label for="Country_id" class="form-label" >Country</label>
       <select class="input w-full border mt-2" name="country_id" required>
           @foreach ($countries as  $c)
           <option value="{{$c->id}}">{{$c->country_name}}</option>
           @endforeach
    </select>
    </div>

    <div class="sm:mt-2">
        <label for="state" class="form-label" >State</label>
       <select class="input w-full border mt-2" name="state_id" required>
           @foreach ($states as  $state)
           <option value="{{$state->id}}">{{$state->state_name}}</option>
           @endforeach
    </select>
    </div>

    <div class="mt-3">
        <label for="smsacity" class="form-label">SMSA CITY</label>
        <input id="smsacity" type="text" name="smsacity" required class="input w-full border mt-2" placeholder="SMSA CITY">
    </div>


    <div class="mt-3">
        <label for="title" class="form-label">title</label>
        <input id="title" type="text" name="title" required class="input w-full border mt-2" placeholder="title">
    </div>
    <div class="mt-3">
        <label for="desc" class="form-label">desc</label>
        <input id="desc" type="text" name="desc" required class="input w-full border mt-2" placeholder="desc">
    </div>

    <div class="mt-3">
        <label for="keywords" class="form-label">keywords</label>
        <input id="keywords" type="text" name="keywords" required class="input w-full border mt-2" placeholder="keywords">
    </div>

    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
