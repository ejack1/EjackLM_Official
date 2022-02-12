@extends('layout.main')

@section('title')
    <title>Add shelvelocations</title>
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
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >shelvelocations</h1>
<div class="accordion">
    <form action="{{route('shelves.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="sm:mt-2">
        <div class="form-group">
            <label for="city_id" class="form-label">Select Country</label>
            <select  id="country-dd" name="country_id" class="input w-full border mt-2">
                <option value="">Select Country</option>
                @foreach ($countries as $data)
                <option value="{{$data->id}}">
                    {{$data->country_name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="sm:mt-2">
        <div class="form-group">
            <label for="state-dd" class="form-label">Select State</label>
            <select   id="state-dd" name="state_id" class="input w-full border mt-2">
            </select>
        </div>
    </div>
    <div class="sm:mt-2">
        <div class="form-group">
            <label for="city_id" class="form-label">Select City</label>
            <select id="city-dd" name="city_id" class="input w-full border mt-2">
            </select>
        </div>
    </div>
    <div class="sm:mt-2">
        <div class="form-group">
            <label for="shelvelocation_id" class="form-label">Select Shelve Location</label>
            <select  id="shelvelocation_id" name="shelvelocation_id" class="input w-full border mt-2">
                <option value="">Select</option>
                @foreach ($shelvelocations as $data)
                <option value="{{$data->id}}">
                  {{$data->city_id}}

                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mt-3">
        <label for="shelveno" class="form-label" >Shelve No.</label>
        <input id="shelveno" type="text" name="shelveno" required class="input w-full border mt-2" placeholder="shelveno">
    </div>



    <button type="submit" class="button bg-theme-1 text-white mt-5">Login</button>

    </form>
</div>
@endsection
@section('script')

<script>
    $(document).ready(function () {
        $('#country-dd').on('change', function () {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.state_name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function () {
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

</script>
@endsection
