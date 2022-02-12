@extends('layouts.app')

@section('content')
<div class="container " >
    <div class="row justify-content-center h bg-transparent">

    </div>
    <div class="d-flex flex-column min-vh-100  justify-content-center align-items-center">
        <div class="card  p-3 bg-transparent w-50"  style=" border-radius:16px;">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row" >
                        <div class="col-md-12 p-3 m-2 text-center ">
                            <img src="{{asset('Admin/dist/images/l.jpeg')}}" alt="" srcset="">
                            <h3 class=" font-weight-bold  text-center mt-3 m-2">Admin Log in</h3>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="email"  placeholder="email address"   type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" placeholder="password"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-12 w-100">
                            <button type="submit" class="btn form-control mb-4 " style="background-color:#F5B51B">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="col-md-12 w-100">
                            <p class="text-darkl  text-center mt-3 m-2">Powered by <span><img src="{{asset('Admin/dist/images/l.jpeg')}}" width="40px" height="15px" alt="" srcset=""></span>  2020</p>
                        </div>
                        <div class="col-md-12 w-100">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>>


</div>

@endsection
