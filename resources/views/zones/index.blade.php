@extends('layout.main')

@section('title')
    <title>Zones</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Zones</h1>




<div class="accordion">
    <form action="{{route('zones.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" class="input w-full border mt-2" placeholder="name">
    </div>




    <button type="submit" class="button bg-theme-1 mb-5 text-white mt-5">Add</button>

    </form>
</div>



<div class="overflow-x-auto">
    <table class="table" id="example">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap">Name</th>

                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $zones as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>

                <td>
                    <form action="{{ route('zones.destroy',$c->id) }}" method="POST">
                        {{-- <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white "  href="{{ route('zones.edit',$c->id) }}" >Edit</a> --}}
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

