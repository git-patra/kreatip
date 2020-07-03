@extends('layouts.app')


@section('main')

<!-- Main Contain -->
<main id="main-list" class="container main-list">
    <!-- Page -->
    <div class="row">

        <section id="tips-item" class="col-xl-9 col-md-12">

            <!-- Main List tips -->
            <section id="tips-populer" class="row tips-populer">
                <h3>Tips Populer</h3>
                <div class="col-xl-12 col-l-12 col-sm-12">

                    <div class="container">
                        <div class="card-deck row-cols-1 row-cols-md-3 row-cols-lg-3">

                            @foreach ($tips as $tip)
                            <div class="col-xl-4 col-l-4 mb-4 col-md-6 col-sm-6">
                                <div id="carousel{{ $loop->iteration }}" class="carousel slide" data-ride="carousel"
                                    data-aos="zoom-in" data-aos-duration="800">
                                    <div class="carousel-inner">
                                        @foreach ($tips as $tip)
                                        <div class="carousel-item {{ ($loop->iteration == 1) ? 'active' : '' }}">

                                            <a
                                                href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
                                                <img src="{{ asset('storage/tips/img' . '/' . $tip->img_thumb ) }}"
                                                    class="d-block w-100" alt="{{ $tip->img_thumb }} - Kreatip">
                                            </a>

                                            <div class="carousel-caption">
                                                <a
                                                    href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
                                                    <h5>{{ $tip->blog_title }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel{{ $loop->iteration }}"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel{{ $loop->iteration }}"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </section>

            <!-- New Tips -->
            <section id="tips-new" class="row tips-new">
                <h3>Tips Terbaru</h3>
                <div class="col-xl-12 col-l-12 col-sm-12 col-12">

                    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3">
                        @foreach ($alltips as $tip)
                        @php
                        $title = explode(" ", $tip->blog_title);
                        $jumlah = count($title);
                        $titik = '';
                        ($jumlah > 8) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 8));
                        @endphp
                        <div class="col mb-4">
                            <div class="card card-tips">
                                <div class="row">
                                    <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                        <a
                                            href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
                                            <img src="{{ asset('storage/tips/img/'.$tip->img_thumb) }}"
                                                class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                        <div class="card-body">
                                            <a
                                                href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
                                                <h6 class="card-title">{{ $first_part }}{{ $titik }}</h6>
                                            </a>
                                            <small class="text-muted">{{ $tip->created_at->format('d F Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <p class="text-right">
                        <button class="btn btn-loadmore" type="submit">Load More</button>
                    </p>

                </div>


            </section>
        </section>

        <aside id="sidebar-right" class="col-12 col-sm-12 col-md-12 col-xl-3 suggest-article">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-1">
                <div class="col">
                    <h4 class="mb-3">Belajar</h4>
                    @foreach ($belajars as $belajar)
                    @php
                    $title = explode(" ", $belajar->blog_title);
                    $jumlah = count($title);
                    $titik = '';
                    ($jumlah > 8 ) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 8));
                    @endphp
                    <div class="row suggest-card">
                        <div class="col-4">
                            <a
                                href="/materi/{{ strtolower(str_replace(' ', '-', $belajar->materiCourse->course_name_alias))}}/{{ strtolower(str_replace(' ', '-', $belajar->bab_mapel))}}">
                                <img src="{{ asset('storage/materi/img' . '/' . $belajar->img_thumb ) }}"
                                    alt="{{ asset('storage/materi/img' . '/' . $belajar->bab_mapel ) }}">
                            </a>
                        </div>
                        <div class="col-8">
                            <a
                                href="/materi/{{ strtolower(str_replace(' ', '-', $belajar->materiCourse->course_name_alias))}}/{{ strtolower(str_replace(' ', '-', $belajar->bab_mapel))}}">
                                {{ $first_part }}{{ $titik }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col">
                    <h4 class="mt-3 mb-3">Info</h4>
                    @foreach ($infos as $info)
                    @php
                    $title = explode(" ", $info->blog_title);
                    $jumlah = count($title);
                    $titik = '';
                    ($jumlah > 8) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 8));
                    @endphp
                    <div class="row suggest-card">
                        <div class="col-4">
                            <a
                                href="{{ url('info/' . strtolower($info->infoCategory->category_name) . '/' . strtolower(str_replace(' ', '-', $info->blog_title)) ) }}">
                                <img src="{{ asset('storage/info/img' . '/' . $info->img_thumb ) }}"
                                    alt="{{ asset('storage/info/img' . '/' . $info->blog_title ) }}">
                            </a>
                        </div>
                        <div class="col-8">
                            <a
                                href="{{ url('info/' . strtolower($info->infoCategory->category_name) . '/' . strtolower(str_replace(' ', '-', $info->blog_title)) ) }}">
                                {{ $first_part }}{{ $titik }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </aside>
    </div>
</main>
@endsection