@extends('layout.main')

@section('title')
    <title>couriers</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >couriers</h1>



<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('couriers.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Courier</a>

</div>




<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap">Name</th>
                 <th class="whitespace-nowrap">Supplier</th>
                 <th class="whitespace-nowrap">Code</th>
                 <th class="whitespace-nowrap">Email</th>
                 <th class="whitespace-nowrap">Vehicle number</th>
                 <th class="whitespace-nowrap">image</th>
                 <th class="whitespace-nowrap">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $couriers as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->supplier}}</td>
                <td>{{$c->code}}</td>
                <td>{{$c->email}}</td>
                <td>{{$c->vehiclenumber}}</td>
                <td><img src="{{asset('license/'.$c->license)}}" width="60px" height="60px" alt=""></td>

                <td>
                    <form action="{{ route('couriers.destroy',$c->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white "  href="{{ route('couriers.edit',$c->id) }}" >Edit</a>
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

