@extends('layout.main')

@section('title')
    <title>Customers</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Customer</h1>
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('customers.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Customer</a>

</div>



<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap"> Name</th>
                 <th class="whitespace-nowrap">email</th>
                 <th class="whitespace-nowrap">Company Name</th>
                 <th class="whitespace-nowrap">Phone</th>
                 <th class="whitespace-nowrap">Address</th>
                 <th class="whitespace-nowrap">Image</th>
                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $customers as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->company}}</td>
                <td>{{$c->phone}}</td>
                <td>{{$c->Address}}</td>
                <td><img src="{{asset('Images/'.$c->image)}}" width="50px" height="50px" alt=""></td>
                <td>
                    <form action="{{ route('customers.destroy',$c->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('customers.show',$c->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('customers.edit',$c->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            {{-- dark:bg-dark-1  --}}
        </tbody>
    </table>
</div>
@endsection
