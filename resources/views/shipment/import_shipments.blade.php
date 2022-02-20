@extends('layout.main')

@section('title')
    <title>Import Shipments</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Import Shipments</h1>
{{-- <div class="w-full sm:w-auto flex pb-4">

    <a href="{{url('shipments.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Shipment</a>

</div> --}}





<div class="overflow-x-auto">

    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                IMPORT SHIPMENTS
            </div>



            <div class="card-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                    {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a> --}}
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
