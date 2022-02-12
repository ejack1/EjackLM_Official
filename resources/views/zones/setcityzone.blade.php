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




    <button type="submit" class="button bg-theme-1 mb-5 text-white mt-5">Search</button>

    </form>
</div>



<div class="overflow-x-auto">
    <table class="table" id="example">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">Name</th>

                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $cities as $c  )
            <tr>

                <td>{{$c->name}}</td>
                <td>
                 <select class="input w-full border mt-2" name="state_id" required>
                        @foreach ($zones as  $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                 </select>
                </td>

            </tr>
            @endforeach

            {{-- dark:bg-dark-1  --}}
        </tbody>
    </table>

</div>


@endsection

