@extends('layout.main')

@section('title')
    <title>Add couriers</title>
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
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Courier</h1>
<div class="accordion">
    <form action="{{route('couriers.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" required class="input w-full border mt-2" placeholder="name">
    </div>
    <div class="sm:mt-2">
        <label for="Country_id" class="form-label" >Country</label>
       <select class="input w-full border mt-2"required name="country_id" required>
           @foreach ($countries as  $country)
           <option value="{{$country->id}}">{{$country->country_name}}</option>
           @endforeach
    </select>
    </div>


    <div class="mt-3">
        <label for="mobile" class="form-label">mobile</label>
        <input id="mobile" type="text" name="mobile" required class="input w-full border mt-2" placeholder="mobile">
    </div>
    <div class="mt-3">
        <label for="email" class="form-label">email</label>
        <input id="email" type="text" name="email" required class="input w-full border mt-2" placeholder="email">
    </div>
    <div class="mt-3">
        <label for="iqamanumber" class="form-label">iqamanumber</label>
        <input id="iqamanumber" type="text" required name="iqamanumber" class="input w-full border mt-2" placeholder="iqamanumber">
    </div>
    <div class="mt-3">
        <label for="iqamafile" class="form-label">iqamafile</label>
        <input id="iqamafile" type="file" required name="iqamafile" class="input w-full border mt-2" placeholder="iqamafile">
    </div>

    <div class="mt-3">
        <label for="license" class="form-label">license#no</label>
        <input id="license" type="file" required name="license" class="input w-full border mt-2" placeholder="license">
    </div>
    <div class="mt-3">
        <label for="vehicle" class="form-label">Type of Vehicle</label>
        <input id="vehicle" type="text" required name="vehicle" class="input w-full border mt-2" placeholder="vehicle">
    </div>
    <div class="mt-3 colorpicker ">
        <label for="color" class="form-label">color</label>
        <input id="color" type="text" required value="#164BC5" name="color" class="input w-full border mt-2" placeholder="color">
    </div>
    <div class="mt-3">
        <label for="supplier" class="form-label">supplier</label>
        <input id="supplier" type="text" required name="supplier" class="input w-full border mt-2" placeholder="supplier">
    </div>
    <div class="mt-3">
        <label for="password" class="form-label">password</label>
        <input id="password" type="text" required name="password" class="input w-full border mt-2" placeholder="password">
    </div>
    <div class="mt-3">
        <label for="vehiclenumber" class="form-label">vehiclenumber</label>
        <input id="vehiclenumber" required type="text" name="vehiclenumber" class="input w-full border mt-2" placeholder="vehiclenumber">
    </div>
    <div class="mt-3">
        <label for="image" class="form-label">image</label>
        <input id="image" required type="file" name="image" class="input w-full border mt-2" placeholder="image">
    </div>
    <div class="mt-3">
        <label for="joindate" class="form-label">joindate</label>
        <input id="joindate" required type="date" name="joindate" class="input w-full border mt-2" placeholder="joindate">
    </div>



    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@endsection
