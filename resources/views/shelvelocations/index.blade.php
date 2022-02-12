@extends('layout.main')

@section('title')
    <title>shelve locations</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Shelve locations</h1>
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('shelvelocations.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Shelve locations</a>

</div>



<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap"> City</th>
                 <th class="whitespace-nowrap"> Shelve Location/Warehouse</th>
                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $shelvelocations as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>
                    @foreach ($cities as $city )
                    @if($city->id == $c->city_id)
                        {{$city->name}}
                    @endif
                    @endforeach

                </td>
                 <td>{{$c->warehouse}}</td>
                <td>
                    <form action="{{ route('shelvelocations.destroy',$c->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white " href="{{ route('shelvelocations.edit',$c->id) }}">Edit</a>
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
