@extends('layout.main')

@section('title')
    <title>Add Staff</title>
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
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >Staff</h1>
<div class="accordion">
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" type="text" name="name" class="input w-full border mt-2" placeholder="name">
    </div>


    <div class="mt-3">
        <label for="email" class="form-label">email</label>
        <input id="email" type="text" name="email" class="input w-full border mt-2" placeholder="email">
    </div>

    <div class="mt-3">
        <label for="password" class="form-label">password</label>
        <input id="password" type="password" name="password" class="input w-full border mt-2" placeholder="password">
    </div>
    <div class="sm:mt-2">
        <div class="form-group">
            <label for="city_id" class="form-label">Country</label>
            <select  id="country-dd" name="country_id" class="input w-full border mt-2">
                <option value="">Select Country</option>
                @foreach ($countries as $data)
                <option value="{{$data->id}}">
                    {{$data->country_name}}
                </option>
                @endforeach
            </select>
            </select>
        </div>
    </div>
    <div class="sm:mt-2">
        <div class="form-group">
            <label for="state-dd" class="form-label">State</label>
            <select   id="state-dd" name="state_id" class="input w-full border mt-2">
            </select>
        </div>
    </div>
    <div class="sm:mt-2">
        <div class="form-group">
            <label for="city_id" class="form-label">City</label>
            <select id="city-dd" name="city_id" class="input w-full border mt-2">
            </select>
        </div>
    </div>

    <div class="mt-3">
        <label for="phone" class="form-label">phone</label>
        <input id="phone" type="text" name="phone" class="input w-full border mt-2" placeholder="phone">
    </div>
    <div class="mt-3">
        <label for="image" class="form-label">Image</label>
        <input id="image" type="file" name="image" class="input w-full border mt-2" placeholder="image">
    </div>
    <div class="sm:mt-2">
        <label for="city_id" class="form-label" >Role</label>
       <select class="input w-full border mt-2" name="role_id" required>
           @foreach ($roles as  $role)
           <option value="{{$role->id}}">{{$role->name}}</option>
           @endforeach
    </select>
    </div>
    <div class="sm:mt-2">
        <label for="designation_id" class="form-label" >Designation</label>
       <select class="input w-full border mt-2" name="designation_id" required>
           @foreach ($designations as  $des)
           <option value="{{$des->id}}">{{$des->name}}</option>
           @endforeach
    </select>
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
