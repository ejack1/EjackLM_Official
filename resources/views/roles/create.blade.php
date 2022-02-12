@extends('layout.main')

@section('title')
    <title>Create New Role</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Add Role</h1>
@if ($errors->any())
<div class="alert-warning">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="accordion">
    <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" required class="input w-full border mt-2" placeholder="name">
    </div>

    <div class="mt-3">
        <label for="name" class="form-label">Permission</label>
        @foreach($permission as $value)
        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name input border mr-2')) }}
        {{ $value->name }}</label>
         <br/>
    @endforeach
    </div>

    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection


