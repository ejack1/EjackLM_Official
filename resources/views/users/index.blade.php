@extends('layout.main')

@section('title')
    <title>Staff</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Staff</h1>
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('users.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Staff</a>

</div>

{{-- <div>
        @if(auth()->user()->role_id == 3)
            <h1> Hello Admin</h1>
        @else
            <h1> Hello Customer </h1>
        @endif
        
</div> --}}


<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap"> Name</th>
                 <th class="whitespace-nowrap"> City</th>
                 <th class="whitespace-nowrap"> Phone</th>
                 <th class="whitespace-nowrap"> email</th>
                 <th class="whitespace-nowrap">Designation</th>

                 <th class="whitespace-nowrap">status</th>

                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->city->name}}</td>
                <td>{{$c->phone}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->getRoleNames()}}</td>
                <td>
                    @if($c->status=='active')
                        <span class="badge badge-success">{{$c->status}}</span>
                    @else
                        <span class="badge badge-warning">{{$c->status}}</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('users.destroy',$c->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white " href="{{ route('users.edit',$c->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-6 text-white">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            {{-- dark:bg-dark-1  --}}
        </tbody>
    </table>
</div>
@endsection
