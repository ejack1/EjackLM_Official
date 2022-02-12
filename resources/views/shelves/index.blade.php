@extends('layout.main')

@section('title')
    <title>shelves</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Shelve </h1>
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('shelves.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Shelve </a>

</div>



<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap"> City</th>
                 <th class="whitespace-nowrap"> Shelve Location</th>
                 <th class="whitespace-nowrap"> Shelve Number</th>
                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $shelves as $shelve  )
            <tr>
                <td>{{$shelve->id}}</td>
                <td>
                    @foreach ($cities as $city )
                    @if($city->id ==  $shelve->city_id)
                        {{$city->name}}
                    @endif
                    @endforeach

                </td>
                 <td>{{ $shelve->shelvelocation_id}}</td>
                 <td>{{ $shelve->shelveno}}</td>
                 <td>
                    <form action="{{ route('shelves.destroy',$shelve->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white " href="{{ route('shelves.edit',$shelve->id) }}">Edit</a>
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
