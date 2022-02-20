@extends('layout.main')

@section('title')
    <title>Testimonials</title>
@endsection

@section('content')
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Testimonials</h1>
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{url('testimonial.create')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Add Testimonial</a>

</div>






<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                 <th class="whitespace-nowrap"> Sr.No</th>
                 <th class="whitespace-nowrap"> Name</th>
                 <th class="whitespace-nowrap"> Email</th>

                 <th class="whitespace-nowrap"> Image</th>

                 <th class="whitespace-nowrap"> Join Date</th>
                 {{-- <th class="whitespace-nowrap"> Route Code</th>
                 <th class="whitespace-nowrap">Driver</th>

                 <th class="whitespace-nowrap">Supplier</th>

                 <th class="whitespace-nowrap">Status</th> --}}

                 <th class="whitespace-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $testimonials as $t  )
            <tr>
                <td>{{$t->id}}</td>
                <td>{{$t->name}}</td>
                <td>{{$t->email}}</td>
                <td>

                <img src="images/testimonials/{{$t->image}}" width="150px" alt="IMG">

                </td>

                

                {{-- <td>{{$t->image}}</td> --}}
                {{-- <td>{{$t->created}}</td> --}}
                <td>
                    {{Carbon\Carbon::parse($t->created)->format("D M j G:i:s T Y")}}
                </td>
                {{-- date("D M j G:i:s T Y") --}}



                <td>


                    {{-- <a href="{{ url('RPO_print',$t->id) }}">  
                        <i class="fa fa-print" aria-hidden="true"></i>
                    </a> --}}

                    {{-- <a href="{{ url('RPO_detail',$t->id) }}">  
                        <i class="fas fa-info-circle"></i>
                    </a> --}}

                    <a href="{{ url('testimonial_update_page',$t->id) }}">  
                        <i class="far fa-plus-square"></i>
                    </a>
                    
                    <a href="{{ url('testimonial_delete',$t->id) }}">  
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                </td>
            </tr>
            @endforeach
            {{-- dark:bg-dark-1  --}}
            {{-- Pagination --}}

        {{-- <div class="d-flex justify-content-center">
            {!! $rpos->links() !!}
        </div> --}}

        </tbody>
    </table>
</div>
@endsection
