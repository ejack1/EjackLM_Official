@extends('layout.main')

@section('title')
    <title>cities</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >cities</h1>



<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('cities.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add City</a>

</div>




<div class="overflow-x-auto">
    <table class="table" id="example">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap">Name</th>
                 <th class="whitespace-nowrap">SMSA City</th>
                 <th class="whitespace-nowrap">City Code</th>
                 <th class="whitespace-nowrap">title</th>
                 <th class="whitespace-nowrap">Description</th>
                 <th class="whitespace-nowrap">keywords</th>

                 <th class="whitespace-nowrap">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $cities as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->smsacity}}</td>
                <td>{{$c->city_code}}</td>
                <td>{{$c->title}}</td>
                <td>{{$c->desc}}</td>
                <td>{{$c->keywords}}</td>

                <td>
                    <form action="{{ route('cities.destroy',$c->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white "  href="{{ route('cities.edit',$c->id) }}" >Edit</a>
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

