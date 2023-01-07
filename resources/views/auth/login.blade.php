@extends('layouts.app')
@section('content')
<head>
    
</head>
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
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 38px; border: 1px solid #EEE; width: 425px;">

                    <form class="col-md-12" method="post" action="{{ route('login') }}"> @csrf
                        <h2>LOGIN</h2>

                        <div class='row'>
                            <div class='input-field col-md-12'>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for='email'>Enter your email</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col-md-12'>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for='password'>Enter your password</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                        </div>

                        <!-- <center>  -->
                        <div class='row'>
                            <button type="submit" class="btn btn-secondary waves-effect indigo col-md-12">
                                Login
                            </button>
                            <!-- <button type='submit' class="btn btn-large waves-effect indigo">Login</button> -->

                            @if (Route::has('password.request'))
                                <a class="link" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            @endif
                        </div>
                        <!-- </center>  -->
                    </form>
                </div>
                <div class="row">
                    <div class="signup col-md-12">
                        <h5 class="signup">Need an account?</h5>
                        <a class="nav-link signup" href="{{ route('register') }}">Sign Up</a>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="col-md-2">

        </div>
    </div>
</div>
@endsection