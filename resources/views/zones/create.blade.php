@extends('layout.main')

@section('title')
    <title>Add countries</title>
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
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Country</h1>
<div class="accordion">
    <form action="{{route('countries.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="country_name" class="form-label">Name</label>
        <input id="country_name" type="text" name="country_name" class="input w-full border mt-2" placeholder="country_name">
    </div>




    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
