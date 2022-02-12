@extends('layout.main')

@section('title')
    <title>Add Products</title>
@endsection

@section('content')
    <h1 style="text-align: center; font-size:2.4rem; padding-top:20px">Add Product type</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="accordion">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <label for="type" class="form-label">Product Type</label><br>
                <input id="type" type="text" name="type" class="input  border mt-2" placeholder="">
            </div>


            <div class="mt-3">
                <h2 style="font-weight: bolder">Weight Ranges Setup</h2><br>
                <div class="d-flex">
                    <table class="table" id="test">
                        <thead>
                            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">Start Range</th>
                                <th class="whitespace-nowrap">End Range</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <td></td>
                            <td>
                                <input id="startrange" type="text" name="startrange" class="input border mt-2"
                                    placeholder="">
                            </td>
                            <td>
                                <input id="endrange" type="text" name="endrange" class="input border mt-2" placeholder="">
                            </td>
                            <td><button type="button" id="add" class="button text-white bg-theme-1 shadow-md mr-2">Add</button></td>
                        </tbody>
                    </table>
                </div>
            </div>
            <h1 style="font-weight: bolder">Weight info</h1>
            <div class="mt-3">

                <label for="maximumweight" class="form-label">maximum Weight(Kg)</label><br>
                <input id="maximumweight" type="text" name="maximumweight" class="input  border mt-2" placeholder="">
            </div>
            <h1 style="font-weight: bolder">Diamention Setup</h1><br>
            <div class="mt-3">
                <div class="flex flex-col sm:flex-row mt-2">
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                        <input type="radio" class="input border mr-2" id="dsetup" name="dsetup" value="0"> <label
                            class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Yes</label>
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                        <input type="radio" class="input border mr-2" id="dsetup" name="dsetup" value="1"> <label
                            class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">No</label>
                    </div>

                </div>
            </div>
            <div class="mt-3">

                <label for="maximumheight" class="form-label">maximum Hieght</label><br>
                <input id="maximumheight" type="text" name="maximumheight" class="input  border mt-2" placeholder="">
            </div>
            <div class="mt-3">

                <label for="maximumwidth" class="form-label">maximum Width</label><br>
                <input id="maximumwidth" type="text" name="maximumwidth" class="input  border mt-2" placeholder="">
            </div>
            <div class="mt-3">

                <label for="maximumlength" class="form-label">maximum Length</label><br>
                <input id="maximumlength" type="text" name="maximumlength" class="input  border mt-2" placeholder="">
            </div>
            <h1 style="font-weight: bolder">Service Type Info </h1>
            <div class="mt-3">

                <label for="type" class="form-label">Select Service Type</label><br>
                <div class="flex flex-col sm:flex-row mt-2">
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                        <input type="radio" class="input border mr-2" id="printer" name="printer" value="0"> <label
                            class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Local Drop off</label>
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                        <input type="radio" class="input border mr-2" id="printer" name="printer" value="1"> <label
                            class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">Collection Service</label>
                    </div>

                </div>
            </div>
            <div class="mt-3">

                <label for="pickupcharge" class="form-label">Pickup Charge</label><br>
                <input id="pickupcharge" type="text" name="pickupcharge" class="input  border mt-2" placeholder="">
            </div>
            <div class="mt-3">

                <label for="timefrom" class="form-label">Time From</label><br>
                <input id="timefrom" type="time" name="timefrom" class="input  border mt-2" placeholder="">
            </div>

            <div class="mt-3">

                <label for="timeto" class="form-label">Time To</label><br>
                <input id="timeto" type="time" name="timeto" class="input  border mt-2" placeholder="">
            </div>
            <h1 style="font-weight: bolder">Printer Required Info </h1>
            <div class="mt-3">

                <label for="type" class="form-label">Printer Required </label><br>
                <div class="flex flex-col sm:flex-row mt-2">
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                        <input type="radio" class="input border mr-2" id="servicetype" name="servicetype" value="0"> <label
                            class="cursor-pointer select-none" for="horizontal-radio-chris-evans">yes</label>
                    </div>
                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                        <input type="radio" class="input border mr-2" id="servicetype" name="printer" value="1"> <label
                            class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">No</label>
                    </div>

                </div>
            </div>

            <div class="mt-3">

                <label for="compensation" class="form-label">Compensation</label><br>
                <input id="compensation" type="text" name="compensation" class="input  border mt-2" placeholder="">
            </div>
            <div class="mt-3">

                <label for="desc" class="form-label">Description</label> <br>
                <input id="desc" type="text" name="desc" class="input   border" placeholder="">


            </div>
            <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

        </form>
    </div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
 var i=1;
   $('#add').click(function (e) {
       e.preventDefault();
    $('#test').append('<tr id="row" class="dynamic-added"><td></td><td><input type="text" name="name[]" class="input border mt-2" /></td><td><input type="text" name="name[]" class="input border mt-2" /></td><td></td> </tr>');

   });


    });
</script>
@endsection
