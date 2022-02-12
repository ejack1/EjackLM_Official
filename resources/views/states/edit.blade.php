@extends('layout.main')

@section('title')
    <title>Edit states</title>
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

    <a href="{{route('states.index')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Back</a>

</div>
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >State</h1>
<div class="accordion">
    <form action="{{ route('branches.update',$state->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-3">
            <label for="state_name" class="form-label" >Name</label>
            <input id="state_name" type="text" value="{{$state->state_name}}" name="state_name" required class="input w-full border mt-2" placeholder="name">
        </div>

        <div class="sm:mt-2">
            <label for="Country_id" class="form-label" >Country</label>
           <select class="input w-full border mt-2" name="country_id" required>
               @foreach ($countries as  $country)
               <option value="{{$country->id}}">{{$country->country_name}}</option>
               @endforeach
        </select>
        </div>

    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
