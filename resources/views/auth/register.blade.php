@extends('layouts.app')
@section('content')

<div class="container-fluid mt-3" >
    <div class="row">
        <div class="col-md-6">
            <div class="welcome">
                <p>HEY!</p>
                <p>Welcome to PLANNET</p>
                <img src="/images/welcome.gif" width="500" height="400" style="margin-top:-5%; margin-left:17%;" alt="contactUs">
            </div>
        </div>

        <div class="col-md-1">&nbsp;</div>

        <div class="col-md-5">
            <img src="/images/PLANNET_login.png" width="120" height="120" style="margin-top:-5%; margin-bottom:-7%; margin-left:26%;" alt="plannet">

            <div class="login-box">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 5px 38px; border: 1px solid #EEE; width:420px;">

                    <form class="col-md-12" method="post" action="{{ route('register') }}"> @csrf
                        <h2>SIGN UP</h2>

                        <div class='row'>
                            <div class='input-field col-md-12'>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="name">Name</label>

                            </div>
                        </div>

                        <div class="row">
                            <div class='input-field col-md-12'>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for='email'>Email Address</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class='input-field col-md-12'>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class='input-field col-md-12'>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">Confirm Password</label>
                            </div>
                        </div>

                        <!-- <center>  -->
                        <div class='row'>
                            <button type="submit" class="btn btn-secondary waves-effect indigo col-md-12">
                                Sign Up
                            </button>
                            
                        </div>
                        <!-- </center>  -->
                    </form>
                </div>
            </div>
        </div> 
        <div class="col-md-2">

        </div>
    </div>
</div>

<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection