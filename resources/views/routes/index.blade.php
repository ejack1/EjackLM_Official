@extends('layout.main')

@section('title')
    <title>Routes</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Routes</h1>


@if ($message = Session::get('success'))

<div class="rounded-md px-5 py-4 mb-2 bg-theme-1 text-white">
    {{ $message }}
</div>
@endif


<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('routes.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Route</a>

</div>




<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap">RouteCode</th>
                 <th class="whitespace-nowrap">Country</th>
                 <th class="whitespace-nowrap">city</th>
                 <th class="whitespace-nowrap">keywords</th>
                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $routes as $route  )
            <tr>
                <td>{{$route->id}}</td>
                {{-- <td>{{$route->routecode}}</td> --}}
                <td>{{$route->routename}}</td>
                <td>{{$route->country_id}}</td>
                <td>{{$route->city_id}}</td>
                <td>{{$route->keywords}}</td>
                <td>
                    <form action="{{ route('routes.destroy',$route->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white "  href="{{ route('routes.edit',$route->id) }}" >Edit</a>
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

