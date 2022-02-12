@extends('layout.main')

@section('title')
    <title>Add Customers</title>
@endsection
@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Customer</h1>
<div class="accordion">
    <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" class="input w-full border mt-2" placeholder="name">
    </div>
    <div class="mt-3">
        <label for="company" class="form-label">company</label>
        <input id="company" type="text" name="company" class="input w-full border mt-2" placeholder="company">
    </div>

    <div class="mt-3">
        <label for="email" class="form-label">email</label>
        <input id="email" type="text" name="email" class="input w-full border mt-2" placeholder="email">
    </div>

    <div class="mt-3">
        <label for="phone" class="form-label">Phone</label>
        <input id="phone" type="text" name="phone" class="input w-full border mt-2" placeholder="phone">
    </div>

    <div class="mt-3">
        <label for="city" class="form-label">City</label>
        <input id="city" type="text" name="city" class="input w-full border mt-2" placeholder="city">
    </div>

    <div class="mt-3">
        <label for="address" class="form-label">address</label>
        <input id="address" type="text" name="address" class="input w-full border mt-2" placeholder="addresss">
    </div>
    <div class="mt-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image"  class="input w-full border mt-2" placeholder="Image">
        @error('image')
          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
       @enderror
    </div>
    <button type="submit" class="button bg-theme-1 text-white mt-5">Login</button>

    </form>
</div>
@endsection
