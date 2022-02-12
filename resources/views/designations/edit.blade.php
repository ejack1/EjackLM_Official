@extends('layout.main')

@section('title')
    <title>Edit Designations</title>
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

    <a href="{{route('designations.index')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Back</a>

</div>
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Country</h1>
<div class="accordion">
    <form action="{{ route('designations.update',$designation->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" value="{{$designation->name}}" class="input w-full border mt-2" placeholder="name">
    </div>



    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
