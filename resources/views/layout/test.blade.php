@extends('layout.main')
@section('title')
<title>Test</title>
@endsection
@section('content')

<h1>Test Page</h1>

  <h2 class="mb-4">Laravel AJAX Dependent Country State City Dropdown Example</h2>
  @foreach ( $countries as $country)
  {{$data->country_name}}
  @endforeach
                <form>
                    <div class="form-group mb-3">
                        <select  id="country_id" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}">
                                {{$data->country_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select id="state-dd" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="city-dd" class="form-control">
                        </select>
                    </div>
                </form>
@endsection
