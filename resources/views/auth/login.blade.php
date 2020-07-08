@extends('dashboard.layouts.app')

@section('main')

@if (session('status'))
@endif
<div class="flash-data" data-flashdata="{{ session('status') }}"></div>

<main id="login" class="login">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('img/img-01.png') }}" alt="Login">
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ url('/di8qb_login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Admin Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
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

                    {{-- <div class="text-center p-t-30">
                        <a class="txt2" href="/mnkmd_register">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</main>
@endsection