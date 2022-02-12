@extends('layout.main')

@section('title')
    <title>Add Branches</title>
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
    <form action="{{route('branches.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" class="input w-full border mt-2" placeholder="name">
    </div>
    <div class="mt-3">
        <label for="country" class="form-label">Country</label>
        <input id="country" type="text" name="country" class="input w-full border mt-2" placeholder="country">
    </div>

    <div class="mt-3">
        <label for="city" class="form-label">City</label>
        <input id="city" type="text" name="city" class="input w-full border mt-2" placeholder="city">
    </div>
    <div class="mt-3">
        <label for="address" class="form-label">address</label>
        <input id="address" type="text" name="address" class="input w-full border mt-2" placeholder="address">
    </div>
    <div class="mt-3">
        <label for="contact" class="form-label">contact</label>
        <input id="contact" type="text" name="contact" class="input w-full border mt-2" placeholder="contact">
    </div>



    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
