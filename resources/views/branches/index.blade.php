@extends('layout.main')

@section('title')
    <title>Branches</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Branches</h1>


@if ($message = Session::get('success'))

<div class="rounded-md px-5 py-4 mb-2 bg-theme-1 text-white">
    {{ $message }}
</div>
@endif


<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('branches.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Branche</a>

</div>




<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap">Name</th>
                 <th class="whitespace-nowrap">Country</th>
                 <th class="whitespace-nowrap">city</th>
                 <th class="whitespace-nowrap">address</th>
                 <th class="whitespace-nowrap">Contact Number</th>
                 <th class="whitespace-nowrap">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $branches as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->country}}</td>
                <td>{{$c->city}}</td>
                <td>{{$c->address}}</td>
                <td>{{$c->contact}}</td>

                <td>
                    <form action="{{ route('branches.destroy',$c->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white "  href="{{ route('branches.edit',$c->id) }}" >Edit</a>
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

