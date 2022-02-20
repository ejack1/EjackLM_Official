@extends('layout.main')

@section('title')
    <title>RPO</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >RPO Details</h1>
{{-- <div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('users.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Staff</a>

</div> --}}
<div class="search hidden sm:block" style="margin: 10px;">
    <form action="{{url('rpo_search')}}" method="post">
        @csrf
        {{-- @method('PUT') --}}

        <input type="text" name="search" class="search__input input placeholder-theme-13" placeholder="Unique ID...">
        {{-- <i data-feather="search" class="search__icon dark:text-gray-300"></i>
        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a> --}}
        <button type="submit" class="button bg-theme-1 text-white mt-5">Search</button>

    </form>
    
</div>


<div class="overflow-x-auto">

    <table class="table">
        <thead>
          <tr>
            <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap"> ID</th>
                 <th class="whitespace-nowrap"> ID PIC</th>
                 <th class="whitespace-nowrap"> Date </th>
                 <th class="whitespace-nowrap"> City</th>
                 <th class="whitespace-nowrap"> Route Code</th>
                 <th class="whitespace-nowrap">Driver</th>

                 <th class="whitespace-nowrap">Supplier</th>

                 <th class="whitespace-nowrap">Status</th>

          </tr>
        </thead>
        <tbody>

            <td>{{$data->id}}</td>
            <td>{{$data->unique_id}}</td>
            <td>
                <img src="../images/{{$data->unique_id_pic}}" width="150px" alt="IMG">
            </td>
            <td>{{$data->created}}</td>
            <td>{{$data->city}}</td>
            <td>{{$data->route_code}}</td>
            <td>{{$data->driver}}</td>
            <td>{{$data->supplier}}</td>
            <td> RTO ( {{$data->status_done}} / {{$data->status_total}} )</td>

        </tbody>
      </table>

</div>
@endsection
