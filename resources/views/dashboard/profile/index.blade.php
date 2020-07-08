@extends('dashboard.layouts.app')
@extends('dashboard.layouts.topbar')
@extends('dashboard.layouts.sidenav')

@section('content')
<main id="page-wrapper" class="page-wrapper">
    <div class="container contain-wrapper contain-profile mt-5">

        @if (session('status'))
        @endif
        <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

        <!--Profile Card 3-->
        <div class="container">
            <div class="row row-cols-3">
                <div class="col"></div>
                <div class="col">
                    <p class="text-right">
                        <button type="button" class="btn btn-rounded btn-outline-warning mb-2" data-toggle="modal"
                            data-target="#edit-profile">
                            <i class="fas fa-edit"></i>
                        </button>
                    </p>

                    <div class="card profile-card-3">
                        <div class="background-block">
                            <img src="{{ asset('storage/profile/img/' . Auth::user()->img ) }}" alt="profile-sample1"
                                class="background" />
                        </div>
                        <div class="card-content">
                            <h2>{{ Auth::user()->name }}<small>{{ Auth::user()->email }}</small></h2>
                            <div class="icon-block">
                                <a href="{{ url('https://instagram.com/' . Auth::user()->ig ) }}" target="_blank"><img
                                        src="{{ asset('storage/profile/img/ig.png') }}" class="zoom" width="50px"
                                        alt=""></a>
                                <a href="{{ url('https://fb.com/' . Auth::user()->fb ) }}" target="_blank"><img
                                        src="{{ asset('storage/profile/img/fb.png') }}" class="zoom" width="50px"
                                        alt=""></a>
                                <a href="{{ url('https://twitter.com/' . Auth::user()->twt ) }}" target="_blank"><img
                                        src="{{ asset('storage/profile/img/twt.png') }}" class="zoom" width="50px"
                                        alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add modal content -->
        <div id="edit-profile" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                            <h3>Edit Profile</h3>
                        </div>

                        <form action="{{ url('dash/auth/profile') }}/{{ Auth::user()->id }}" method="post"
                            class="pl-3 pr-3" enctype="multipart/form-data">
                            @method('patch')
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" id="name" name="name" required
                                    value="{{ Auth::user()->name }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email" required
                                    value="{{ Auth::user()->email }}">
                            </div>

                            {{-- Image Thumbnail --}}
                            <h5 class="mt-3">Image Profile</h5>
                            <div class="form-group row row-edit-img-blog">
                                <div class="row">
                                    <div class="col-sm-6 pr-0">
                                        <img src="{{ asset('storage/profile/img/' . Auth::user()->img ) }}"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-6 bt">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputImgFile" name="img"
                                                aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01"
                                                for="inputImgFile">{{ Auth::user()->img }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ig">Instagram</label>
                                <input class="form-control" type="text" id="ig" name="ig" required
                                    value="{{ Auth::user()->ig }}">
                            </div>

                            <div class="form-group">
                                <label for="fb">Facebook</label>
                                <input class="form-control" type="text" id="fb" name="fb" required
                                    value="{{ Auth::user()->fb }}">
                            </div>

                            <div class="form-group">
                                <label for="twt">Twitter</label>
                                <input class="form-control" type="text" id="twt" name="twt" required
                                    value="{{ Auth::user()->twt }}">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</main>

@endsection