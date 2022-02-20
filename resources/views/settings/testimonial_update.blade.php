@extends('layout.main')

@section('title')
    <title>Update Testimonial</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Update Testimonial</h1>
{{-- <div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('users.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Staff</a>

</div> --}}
{{-- <div class="search hidden sm:block">
    <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
    <i data-feather="search" class="search__icon dark:text-gray-300"></i>
</div>
<a class="notification sm:hidden" href=""> <i data-feather="search"
        class="notification__icon dark:text-gray-300"></i> </a> --}}

<div class="overflow-x-auto">

    <div class="accordion">
        <form action="{{url('mainsettings.testimonial.updated')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input id="name" type="hidden" name="id" value="{{$testimonial->id}}"  class="input w-full border mt-2" placeholder="Name...">


        <div class="mt-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name" value="{{$testimonial->name}}"  class="input w-full border mt-2" placeholder="Name...">
        </div>

        <div class="mt-3">
            <label for="name" class="form-label">Email</label>
            <input id="name" type="text" name="email" value="{{$testimonial->email}}" class="input w-full border mt-2" placeholder="Email...">
        </div>

        {{-- @error('unique_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}

        <div class="mt-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image"  class="input w-full border mt-2" placeholder="Image">
            @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>


        {{-- <div class="mt-3">
            <label for="company" class="form-label">ID Picture</label>
            <input id="company" type="text" name="company" class="input w-full border mt-2" placeholder="company">
        </div> --}}
    
        {{-- <div class="mt-3">
            <label for="email" class="form-label">City</label>
            <input id="email" type="text" name="city" class="input w-full border mt-2" placeholder="City">
        </div>
    
        <div class="mt-3">
            <label for="phone" class="form-label">Route Code</label>
            <input id="phone" type="text" name="route_code" class="input w-full border mt-2" placeholder="Route Code">
        </div>
    
        <div class="mt-3">
            <label for="city" class="form-label">Driver</label>
            <input id="city" type="text" name="driver" class="input w-full border mt-2" placeholder="Driver">
        </div>

        <div class="mt-3">
            <label for="city" class="form-label">Status Done</label>
            <input id="city" type="text" name="status_done" class="input  border mt-2" placeholder="Status Done">
            /  <input id="city" type="text" name="status_total" class="input  border mt-2" placeholder="Status Total">
            
        </div>


    
        <div class="mt-3">
            <label for="address" class="form-label">Supplier</label>
            <input id="address" type="text" name="supplier" class="input w-full border mt-2" placeholder="Supplier">
        </div> --}}
        
        <button type="submit" class="button bg-theme-1 text-white mt-5">Update Testimonial</button>
    
        </form>
    </div>

</div>
@endsection