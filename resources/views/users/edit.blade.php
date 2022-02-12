@extends('layout.main')

@section('title')
    <title>Edit Staff</title>
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

    <a href="{{route('users.index')}}"   class="button text-white bg-theme-1 shadow-md mr-2"  style="text-align: center; font-size:0.9rem; padding:14px">Back</a>

</div>
<h1 style="text-align: center; font-size:2.4rem; padding-top:20px" >User</h1>
<div class="accordion">
    <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mt-3">
            <label for="name" class="form-label" >Name</label>
            <input id="name" type="text" value="{{$user->name}}" name="name" required class="input w-full border mt-2" placeholder="name">
        </div>
        <div class="mt-3">
            <label for="email" class="form-label" >email</label>
            <input id="email" type="text" value="{{$user->email}}" name="email" required class="input w-full border mt-2" placeholder="name">
        </div>
        <div class="mt-3">
            <label for="password" class="form-label" >password</label>
            <input id="password" type="password" name="password" required class="input w-full border mt-2" placeholder="password">
        </div>
        <div class="mt-3">
            <label for="image" class="form-label" >image</label>
            <input id="image" type="file" name="image" required class="input w-full border mt-2" placeholder="password">
        </div>
        <div class="mt-3">
            <label for="phone" class="form-label" >phone</label>
            <input id="phone" type="text" value="{{$user->phone}}" name="phone" required class="input w-full border mt-2" placeholder="phone">
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


        <div class="sm:mt-2">
            <label for="Country_id" class="form-label" >Status</label>
           <select class="input w-full border mt-2" name="status" required>
               <option value="active">active</option>
               <option value="inactive">inactive</option>

        </select>
        </div>




    <button type="submit" class="button bg-theme-1 text-white mt-5">Submit</button>

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
