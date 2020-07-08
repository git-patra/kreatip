@extends('dashboard.layouts.app')

@section('main')
<main id="login" class="login">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('img/img-01.png') }}" alt="Login">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ url('/mnkmd_register') }}">
                    @csrf
                    <span class="login100-form-title">
                        Register Account
                    </span>

                    <div class="wrap-input100 validate-input" required>
                        <input class="input100  @error('name') invalid @enderror" type="text" name="name"
                            value="{{ old('name') }}" autocomplete="name" placeholder="Name">

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    @error('name')
                    <span class="invalid-feedback text-center" role="alert">
                        <i>{{ $message }}</i>
                    </span>
                    @enderror


                    <div class="wrap-input100 validate-input" required>
                        <input class="input100  @error('email') invalid @enderror" value="{{ old('email') }}"
                            type="email" name="email" autocomplete="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    @error('email')
                    <span class="invalid-feedback text-center" role="alert">
                        <i>{{ $message }}</i>
                    </span>
                    @enderror


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="password" class="input100 @error('password') invalid @enderror" type="password"
                            name="password" autocomplete="new-password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    @error('password')
                    <span class="invalid-feedback text-center" role="alert">
                        <i>{{ $message }}</i>
                    </span>
                    @enderror


                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="password-confirm" class="input100" type="password" name="password_confirmation"
                            autocomplete="new-password" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-30">
                        <span class="txt1">Have account?</span><a class="txt2" href="/login">
                            login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection