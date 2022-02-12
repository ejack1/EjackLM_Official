@extends('layout.main')

@section('title')
    <title>Edit products</title>
@endsection

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


@section('content')
<div class="w-full sm:w-auto flex pb-4">

    <a href="{{route('products.index')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Back</a>

</div>
<div class="accordion">
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-3">
            <label for="type" class="form-label">Product Type</label>
            <input id="type" type="text" value="{{$product->type}}" name="type" class="input w-full border mt-2" placeholder="">
        </div>


        <div class="mt-3">
            <h2 style="font-weight: bolder">Weight Ranges Setup</h2>
            <div class="d-flex">
                <table class="table" id="example">
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
                            <input id="startrange" value="{{$product->startrange}}"   type="text" name="startrange" class="input border mt-2"
                                placeholder="">
                        </td>
                        <td>
                            <input id="endrange"  value="{{$product->endrange}}"   type="text" name="endrange" class="input border mt-2" placeholder="">
                        </td>
                        <td><button type="button" class="button text-white bg-theme-1 shadow-md mr-2">Add</button></td>
                    </tbody>
                </table>
            </div>
        </div>
        <h1 style="font-weight: bolder">Weight info</h1>
        <div class="mt-3">

            <label for="maximumweight"  class="form-label">maximum Weight(Kg)</label>
            <input id="maximumweight" value="{{$product->maximumweight}}"  type="text" name="maximumweight" class="input w-full border mt-2" placeholder="">
        </div>
        <h1 style="font-weight: bolder">Diamention Setup</h1>
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

            <label for="maximumheight" class="form-label">maximum Hieght</label>
            <input id="maximumheight" type="text" value="{{$product->maximumheight}}"  name="maximumheight" class="input w-full border mt-2" placeholder="">
        </div>
        <div class="mt-3">

            <label for="maximumwidth" class="form-label">maximum Width</label>
            <input id="maximumwidth" type="text" value="{{$product->maximumwidth}}"  name="maximumwidth" class="input w-full border mt-2" placeholder="">
        </div>
        <div class="mt-3">

            <label for="maximumlength" class="form-label">maximum Length</label>
            <input id="maximumlength" type="text" value="{{$product->maximumlength}}"  name="maximumlength" class="input w-full border mt-2" placeholder="">
        </div>
        <h1 style="font-weight: bolder">Service Type Info </h1>
        <div class="mt-3">

            <label for="type" class="form-label">Select Service Type</label>
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

            <label for="pickupcharge" class="form-label">Pickup Charge</label>
            <input id="pickupcharge" value="{{$product->pickupcharge}}"  type="text" name="pickupcharge" class="input w-full border mt-2" placeholder="">
        </div>
        <div class="mt-3">

            <label for="timefrom" class="form-label">Time From</label>
            <input id="timefrom" value="{{$product->timefrom}}" type="time" name="timefrom" class="input w-full border mt-2" placeholder="">
        </div>

        <div class="mt-3">

            <label for="timeto" class="form-label">Time </label>
            <input id="timeto" type="time" value="{{$product->timeto}}"  name="timeto" class="input w-full border mt-2" placeholder="">
        </div>
        <h1 style="font-weight: bolder">Printer Required Info </h1>
        <div class="mt-3">

            <label for="type" class="form-label">Printer Required </label>
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

            <label for="compensation" class="form-label">Compensation</label>
            <input id="compensation" type="text" value="{{$product->compensation}}"  name="compensation" class="input w-full border mt-2" placeholder="">
        </div>
        <div class="mt-3">

            <label for="desc" class="form-label">Description</label>
            <input id="desc" type="text"value="{{$product->desc}}"  name="desc" class="input w-full border mt-2" placeholder="">
        </div>

    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

    </form>
</div>
@endsection
