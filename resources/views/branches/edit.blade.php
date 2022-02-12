@extends('layout.main')

@section('title')
    <title>Edit Branches</title>
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

    <a href="{{route('branches.index')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Back</a>

</div>
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Branch</h1>
<div class="accordion">
    <form action="{{ route('branches.update',$branch->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" value="{{$branch->name}}" class="input w-full border mt-2" placeholder="name">
    </div>
    <div class="mt-3">
        <label for="country" class="form-label">Country</label>
        <input id="country" type="text" name="country" value="{{$branch->country}}"  class="input w-full border mt-2" placeholder="country">
    </div>

    <div class="mt-3">
        <label for="city" class="form-label">City</label>
        <input id="city" type="text" name="city" value="{{$branch->city}}"  class="input w-full border mt-2" placeholder="city">
    </div>
    <div class="mt-3">
        <label for="address" class="form-label">address</label>
        <input id="address" type="text" name="address" value="{{$branch->address}}"  class="input w-full border mt-2" placeholder="address">
    </div>
    <div class="mt-3">
        <label for="contact" class="form-label">contact</label>
        <input id="contact" type="text" name="contact" value="{{$branch->contact}}"  class="input w-full border mt-2" placeholder="contact">
    </div>



    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
