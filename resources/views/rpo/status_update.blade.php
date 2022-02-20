@extends('layout.main')

@section('title')
    <title>RPO Status Update</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >RPO Status Update</h1>

<hr>
{{-- <h1>{{$data}}</h1> --}}
<style>
    form{
        margin: 20px;
        padding: 20px;
        font-size: 20px;
    }
</style>

{{-- <form class="col-sm" action="rpo_status_updated" method="post"> --}}

<form class="col-sm" action="{{ url('rpo_status_updated/'.$data->id) }}" method="post">

    {{-- "{{ url('rpo_status_updated/'.$student->id) }}" --}}

    {{-- <div class="form-group"> --}}
        @method('PUT')


        @csrf
        <input type="hidden" name="status_done" value="{{$data->id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 



      <label for="exampleInputEmail1">Status : </label>
      <input style="text-align: center;" type="text" name="status_done" value="{{$data->status_done}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> / 

    {{-- </div> --}}
    {{-- <div class="form-group"> --}}


      <label for="exampleInputPassword1"></label>
      <input style="text-align: center;" type="text" name="status_total" value="{{$data->status_total}}" class="form-control" id="exampleInputPassword1" >


    {{-- </div> --}}

    {{-- <div class="form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="overflow-x-auto">
    
</div>
@endsection
