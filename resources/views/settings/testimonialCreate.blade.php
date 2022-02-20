@extends('layout.main')

@section('title')
    <title>Add Testimonial</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Add Testimonial</h1>
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


    <div style="width: 40%;margin: auto; text-align: center;">

        <div class="accordion">
            <form action="{{url('mainsettings.testimonial.create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" type="text" name="name" class="input w-full border mt-2" placeholder="Name...">
            </div>
    
            <div class="mt-3">
                <label for="name" class="form-label">Email</label>
                <input id="name" type="text" name="email" class="input w-full border mt-2" placeholder="Email...">
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
    
            
            <button type="submit" class="button bg-theme-1 text-white mt-5">Add Testimonial</button>
    </div>
    
    
        </form>
    </div>

</div>
@endsection