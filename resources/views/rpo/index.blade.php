@extends('layout.main')

@section('title')
    <title>RPO</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >RPO</h1>
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{url('rpo.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add RPO</a>

</div>

<div class="search hidden sm:block" style="margin: 10px;">
    <form action="{{url('rpo_search')}}" method="post">
        @csrf
        {{-- @method('PUT') --}}

        <input type="text" name="search" class="search__input input placeholder-theme-13" placeholder="Unique ID...">
        {{-- <i data-feather="search" class="search__icon dark:text-gray-300"></i>
        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a> --}}
        <button type="submit" class="button bg-theme-1 text-white mt-5">Search</button>

    </form>
    
</div>




<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap"> ID</th>
                 <th class="whitespace-nowrap"> ID PIC</th>

                 <th class="whitespace-nowrap"> Date</th>

                 <th class="whitespace-nowrap"> City</th>
                 <th class="whitespace-nowrap"> Route Code</th>
                 <th class="whitespace-nowrap">Driver</th>

                 <th class="whitespace-nowrap">Supplier</th>

                 <th class="whitespace-nowrap">Status</th>

                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $rpos as $c  )
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->unique_id}}</td>
                <td>
                
                {{-- <a href=""></a> --}}
                <img src="images/{{$c->unique_id_pic}}" width="150px" alt="IMG">
                {{-- <img src="{{public_path('images')}}/{{$c->unique_id_pic}}" alt="IMG"> --}}

                </td>

                <td>{{$c->created}}</td>

                <td>{{$c->city}}</td>
                <td>{{$c->route_code}}</td>
                <td>{{$c->driver}}</td>
                <td>{{$c->supplier}}</td>
                @if($c->status_total - $c->status_done < 1)
                    
                    <td> RTO DONE ( {{$c->status_done}} / {{$c->status_total}} )</td>
                @else
                {{-- <td> RTO DONE ( {{$c->status_done}} / {{$c->status_total}} )</td> --}}
                <td> RTO PEND ({{$c->status_done}}/{{$c->status_total}})</td>
                @endif

                <td>
                    {{-- href="{{ route('users.edit',$c->id) }}" --}}
                    

                    <a href="{{ url('RPO_print',$c->id) }}">  
                        <i class="fa fa-print" aria-hidden="true"></i>
                    </a>

                    <a href="{{ url('RPO_detail',$c->id) }}">  
                        <i class="fas fa-info-circle"></i>
                    </a>

                    <a href="{{ url('RPO_status_update',$c->id) }}">  
                        <i class="far fa-plus-square"></i>
                    </a>
                    
                    <a href="{{ url('RPO_delete',$c->id) }}">  
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    

                    {{-- <a href="{{ url('rpo.print',$c->id) }}">  
                        <i class="fa fa-print" aria-hidden="true"></i>
                    </a> --}}
                </td>

                {{-- <td>{{$c->getRoleNames()}}</td> --}}
                {{-- <td>
                    @if($c->status=='active')
                        <span class="badge badge-success">{{$c->status}}</span>
                    @else
                        <span class="badge badge-warning">{{$c->status}}</span>
                    @endif
                </td> --}}
                {{-- <td>
                    <form action="{{ route('users.destroy',$c->id) }}" method="POST">
                        <a class="button w-24 mr-1 mb-2 bg-theme-9 text-white " href="{{ route('users.edit',$c->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button w-24 mr-1 mb-2 bg-theme-6 text-white">Delete</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
            {{-- dark:bg-dark-1  --}}
            {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $rpos->links() !!}
        </div>

        </tbody>
    </table>
</div>
@endsection
