@extends('layouts.app')

@section('main')
<main id="main-list" class="container main-list">
    <!-- Page -->
    <div class="row">

        <section id="info-item" class="col-xl-9 col-md-12 info-item">

            @foreach ($categories as $category)

            <!-- Jenis Jenis Info -->
            <div class="row info-category">
                <div class="col-xl-6 mb-3 col-l-6 col-md-6 col-sm-6 col-6">
                    <h3>{{ $category->category_name }}</h3>
                </div>
                <div class="col-xl-6 col-l-6 col-md-6 col-sm-6 col-6 text-right">
                    <h6>
                        <a class="btn btn-loadmore"
                            href="{{ url('/info') }}/{{ strtolower($category->category_name) }}">Selengkapnya</a>
                    </h6>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                @if ($category->id == 1)
                @foreach ($beasiswas as $bea)
                <div class="col mb-4">
                    <div id="carousel{{ $loop->iteration }}" class="carousel slide" data-ride="carousel"
                        data-aos="zoom-in" data-aos-duration="900">
                        <div class="carousel-inner">
                            @foreach ($beasiswas as $bea)
                            <div class="carousel-item {{ ($loop->iteration == 1) ? 'active' : '' }}">
                                <a href="{{ url('info/' . strtolower($category->category_name) . '/' . strtolower(str_replace(' ', '-', $bea->blog_title)) ) }}"
                                    title="{{ $bea->blog_title }}">
                                    <img src="{{ asset('storage/info/img' . '/' . $bea->img_thumb ) }}"
                                        class="d-block w-100"
                                        alt="{{ asset('storage/info/img' . '/' . $bea->img_thumb ) }}">
                                </a>

                                <div class="carousel-caption">
                                    <a href="{{ url('info/' . strtolower($category->category_name) . '/' . strtolower(str_replace(' ', '-', $bea->blog_title)) ) }}"
                                        title="{{ $bea->blog_title }}">
                                        <h5>{{ $bea->blog_title }}</h5>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel{{ $loop->iteration }}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel{{ $loop->iteration }}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                @endforeach

                @elseif ($category->id == 2)
                @foreach ($pelatihans as $pelat)
                <div class="col mb-4">
                    <div id="carousel{{ $loop->iteration+3 }}" class="carousel slide" data-ride="carousel"
                        data-aos="zoom-in" data-aos-duration="900">
                        <div class="carousel-inner">
                            @foreach ($pelatihans as $blo)
                            <div class="carousel-item {{ ($loop->iteration+3 == 4) ? 'active' : '' }}">
                                <a href="{{ url('info/' . strtolower($category->category_name) . '/' . strtolower(str_replace(' ', '-', $blo->blog_title)) ) }}"
                                    title="{{ $blo->blog_title }}">
                                    <img src="{{ asset('storage/info/img' . '/' . $blo->img_thumb ) }}"
                                        class="d-block w-100"
                                        alt="{{ asset('storage/info/img' . '/' . $blo->img_thumb ) }}">
                                </a>

                                <div class="carousel-caption">
                                    <a href="{{ url('info/' . strtolower($category->category_name) . '/' . strtolower(str_replace(' ', '-', $blo->blog_title)) ) }}"
                                        title="{{ $blo->blog_title }}">
                                        <h5>{{ $blo->blog_title }}</h5>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel{{ $loop->iteration+3 }}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel{{ $loop->iteration+3 }}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                @endforeach
                @endif

            </div>

            @endforeach

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
                    <h4 class="mt-3 mb-3">Tips</h4>
                    @foreach ($tips as $tip)
                    @php
                    $title = explode(" ", $tip->blog_title);
                    $jumlah = count($title);
                    $titik = '';
                    ($jumlah > 8) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 8));
                    @endphp
                    <div class="row suggest-card">
                        <div class="col-4">
                            <a href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
                                <img src="{{ asset('storage/tips/img' . '/' . $tip->img_thumb ) }}"
                                    alt="{{ asset('storage/tips/img' . '/' . $tip->blog_title ) }}">
                            </a>
                        </div>
                        <div class="col-8">
                            <a href="{{ url('tips/' . strtolower(str_replace(' ', '-', $tip->blog_title)) ) }}">
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