@extends('layout.main')

@section('title')
    <title>Bulk Print</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Bulk Print</h1>
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
        <form action="{{url('shipments.bulk_print')}}" method="post" enctype="multipart/form-data">
        @csrf





        <div class="container" style="display: inline-flex;">


            <div style="margin: auto; text-align: center; ">


                {{-- <h1 class="" style="font-size:20px;margin:15px; padding: 48px;">Bulk Print</h1> --}}
  
                <div class="mt-3">
                    <label for="name" class="form-label">AWB Number</label>
                    {{-- <input id="name" type="text" name="sender_address" class="input w-full border mt-2" placeholder=""> --}}
                    <textarea class="input w-full border mt-2"  name="awb"  id="" cols="30" rows="10"></textarea>
                </div>



            </div>


        </div>


        <div class="container" style="    text-align: center;
            font-size: 20px;
            margin-top: 20px;">
            <button type="submit" class="button bg-theme-1 text-white mt-5">Print Shipments</button>
        </div>


        </form>
    </div>

</div>
@endsection