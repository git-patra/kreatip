@extends('layouts.app')

@section('main')
<section class="wp">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <img src="{{ asset('img/wp.webp') }}" alt="">
        </div>
        <div class="col">
            <div class="container">
                <h3 class="text-center">Ga pernah lupa upgrade diri</h3>
                <p class="text-center">Dengan Belajar</p>
                <p class="text-center">#Dirumah aja</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Menu -->
<section id="menu" class="row menu">
    <div class="col-xl-12">
        <div class="container conten-card">
            <div class="card-deck card-menu text-center">
                <a href="{{ url('/materi') }}" class="text-center">
                    <div class="card card-icon" data-aos="zoom-in" data-aos-duration="800">
                        <h1><i class="fas fa-book "></i></h1>
                        <div class="card-body cd-bd">
                            <h2 class="text-center">Belajar</h2>
                        </div>
                    </div>
                </a>
                <a href="{{ url('/tips') }}" class="text-center">
                    <div class="card card-icon" data-aos="zoom-in" data-aos-duration="800">
                        <h1><i class="far fa-lightbulb text-center"></i></h1>
                        <div class="card-body">
                            <h2 class="text-center">Tips</h2>
                        </div>
                    </div>
                </a>
                <a href="{{ url('/info') }}" class="text-center">
                    <div class="card card-icon" data-aos="zoom-in" data-aos-duration="800">
                        <h1><i class="far fa-newspaper text-center"></i></h1>
                        <div class="card-body">
                            <h2 class="text-center">Info</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Sugesst -->
<section id="suggest" class="row suggest">
    <div class="col-xl-12">
        <div class="container conten-card">
            <div class="card-deck tips-populerrow row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">

                <div class="col mb-4" data-aos="zoom-in" data-aos-duration="800">
                    <div id="carousel1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner p-0">
                            @foreach ($belajars as $belajar)
                            <div class="carousel-item {{ ($loop->iteration == 1) ? 'active' : '' }}">
                                <a
                                    href="{{ url('materi/'. strtolower(str_replace(' ', '-', $belajar->materiCourse->course_name_alias)) . '/' . strtolower(str_replace(' ', '-',$belajar->bab_mapel)) ) }}">
                                    <img src="{{ asset('storage/materi/img' . '/' . $belajar->img_thumb ) }}"
                                        class="d-block w-100"
                                        alt="{{ asset('storage/materi/img' . '/' . $belajar->blog_title ) }}">
                                </a>

                                <div class="carousel-caption">
                                    <a
                                        href="{{ url('materi/'. strtolower(str_replace(' ', '-', $belajar->materiCourse->course_name_alias)) . '/' . strtolower(str_replace(' ', '-',$belajar->bab_mapel)) ) }}">
                                        <h5>{{ $belajar->blog_title }}</h5>
                                    </a>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col mb-4" data-aos="zoom-in" data-aos-duration="500">
                    <div id="carousel4" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner p-0">
                            @foreach ($tips as $tip)
                            <div class="carousel-item {{ ($loop->iteration+3 == 4) ? 'active' : '' }}">
                                <a href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
                                    <img src="{{ asset('storage/tips/img' . '/' . $tip->img_thumb ) }}"
                                        class="d-block w-100"
                                        alt="{{ asset('storage/tips/img' . '/' . $tip->blog_title ) }}">
                                </a>

                                <div class="carousel-caption">
                                    <a href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
                                        <h5>{{ $tip->blog_title }}</h5>
                                    </a>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel4" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel4" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col mb-4" data-aos="zoom-in" data-aos-duration="800">
                    <div id="carousel7" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner p-0">
                            @foreach ($infos as $info)
                            <div class="carousel-item {{ ($loop->iteration+6 == 7) ? 'active' : '' }}">
                                <a href="{{ url('info/' . strtolower($info->infoCategory->category_name) . '/' . strtolower(str_replace(' ', '-', $info->blog_title)) ) }}" ">
                                    <img src=" {{ asset('storage/info/img' . '/' . $info->img_thumb ) }}"
                                    class="d-block w-100"
                                    alt="{{ asset('storage/info/img' . '/' . $info->img_thumb ) }}">
                                </a>

                                <div class="carousel-caption">
                                    <a href="{{ url('info/' . strtolower($info->infoCategory->category_name) . '/' . strtolower(str_replace(' ', '-', $info->blog_title)) ) }}" ">
                                        <h5>{{ $info->blog_title }}</h5>
                                    </a>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <a class=" carousel-control-prev" href="#carousel7" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel7" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>

</section>


@endsection