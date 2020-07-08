@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="row row-cols-3 mt-5">
        <div class="col"></div>
        <div class="col">
            <div class="container contain-wrapper contain-profile mt-5">

                @if (session('status'))
                @endif
                <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

                <form id="form-change-password" role="form" method="POST" action="{{ url('/dash/auth/changepass') }}"
                    novalidate>
                    @csrf

                    <label for="current-password" class="control-label">Current Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control @error('current-password') is-invalid @enderror"
                            id="current-password" name="current-password" placeholder="..">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <label for="password" class="control-label">New Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="....">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <label for="password_confirmation" class="control-label">Re-enter New Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="....">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>
@endsection