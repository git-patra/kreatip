@extends('layouts.app')
@extends('layouts.meta')

@section('main')
<main id="tips" class="container tips">
    <!-- Page -->
    <div class="row">

        <article id="tips-article" class="col-xl-9 col-lg-8  col-md-12 tips-article">

            <!-- Author and Time -->
            <div class="row row-cols-2">
                <div class="author-article col"><a href="/me" target="_blank">{{ $article->creator }}</a>
                </div>
                <time class="text-muted time-article col text-right"><small>{{ $article->created_at->format('d F Y') }}
                        | {{ $article->created_at->format('h:i') }}
                        WIB</small></time>
            </div>
            <br />

            <!-- Judul Article -->
            <h3 class="text-center">{{ $article->blog_title }}</h3>
            <hr>

            <!-- Main Image Article -->
            <p class="text-center p-img">
                <img src="{{ asset('storage/tips/img/'.$article->img_thumb)}}"
                    alt="{{ $article->blog_title }} - kreatip.id" title="{{ $article->blog_title }}">
            </p>
            <p class="text-center p-img"><small class="font-italic">{{ $article->img_source }}</small></p>

            <br>
            {!! $article->blog_post !!}

        </article>

        <aside id="sidebar-right" class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 suggest-article">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 row-cols-xl-1">
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
                                href="/materi/{{ strtolower(str_replace(' ', '-', $belajar->materiCourse->course_name))}}/{{ strtolower(str_replace(' ', '-', $belajar->bab_mapel))}}">
                                <img src="{{ asset('storage/materi/img' . '/' . $belajar->img_thumb ) }}"
                                    alt="{{ asset('storage/materi/img' . '/' . $belajar->bab_mapel ) }}">
                            </a>
                        </div>
                        <div class="col-8">
                            <a
                                href="/materi/{{ strtolower(str_replace(' ', '-', $belajar->materiCourse->course_name))}}/{{ strtolower(str_replace(' ', '-', $belajar->bab_mapel))}}">
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