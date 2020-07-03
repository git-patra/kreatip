@extends('layouts.app')

@section('main')
<main id="search" class="container search">
    <div class="article-item">
        <h3>Search Result:</h3>
        <div class="col-xl-12 col-l-12 col-sm-12 col-12">

            @if (count($belajars) > 0)
            <h4>Artikel Belajar:</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
                @foreach ($belajars as $article)
                @php
                $title = explode(" ", $article->blog_title);
                $course = str_replace(" ", '-', $article->materiCourse->course_name_alias);
                $jumlah = count($title);
                $titik = '';
                ($jumlah > 13) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 13));
                @endphp
                <div class="col mb-4">
                    <div class="card card-search">
                        <div class="row">
                            <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                <a
                                    href="/materi/{{ strtolower($course) }}/{{ strtolower(str_replace(' ', '-', $article->bab_mapel)) }}">
                                    <img src="{{ asset('storage/materi/img/'.$article->img_thumb) }}"
                                        class="card-img-top" alt="...">
                                </a>
                            </div>
                            <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                <div class="card-body">
                                    <a
                                        href="/materi/{{ strtolower($course) }}/{{ strtolower(str_replace(' ', '-', $article->bab_mapel)) }}">
                                        <h6 class="card-title">{{ $first_part }}{{ $titik }}</h6>
                                    </a>
                                    <small class="text-muted">{{ $article->created_at->format('d F Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if (count($tips) > 0)
            <h4>Artikel Tips:</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
                {{-- Tips --}}
                @foreach ($tips as $article)
                @php
                $title = explode(" ", $article->blog_title);
                $jumlah = count($title);
                $titik = '';
                ($jumlah > 13) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 13));
                @endphp
                <div class="col mb-4">
                    <div class="card card-search">
                        <div class="row">
                            <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                <a href="/tips/{{ strtolower(str_replace(' ', '-', $article->blog_title)) }}">
                                    <img src="{{ asset('storage/tips/img/'.$article->img_thumb) }}" class="card-img-top"
                                        alt="...">
                                </a>
                            </div>
                            <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                <div class="card-body">
                                    <a href="/tips/{{ strtolower(str_replace(' ', '-', $article->blog_title)) }}">
                                        <h6 class="card-title">{{ $first_part }}{{ $titik }}</h6>
                                    </a>
                                    <small class="text-muted">{{ $article->created_at->format('d F Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if (count($infos) > 0)
            <h4>Artikel Info:</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
                {{-- Info --}}
                @foreach ($infos as $article)
                @php
                $title = explode(" ", $article->blog_title);
                $jumlah = count($title);
                $titik = '';
                ($jumlah > 13) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 13));
                @endphp
                <div class="col mb-4">
                    <div class="card card-search">
                        <div class="row">
                            <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                <a
                                    href="/info/{{ strtolower($article->infoCategory->category_name) }}/{{ strtolower(str_replace(' ', '-', $article->blog_title)) }}">
                                    <img src="{{ asset('storage/info/img/'.$article->img_thumb) }}" class="card-img-top"
                                        alt="...">
                                </a>
                            </div>
                            <div class="col-xl-12 col-l-12 col-md-12 col-12">
                                <div class="card-body">
                                    <a
                                        href="/info/{{ strtolower($article->infoCategory->category_name) }}/{{ strtolower(str_replace(' ', '-', $article->blog_title)) }}">
                                        <h6 class="card-title">{{ $first_part }}{{ $titik }}</h6>
                                    </a>
                                    <small class="text-muted">{{ $article->created_at->format('d F Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @if (!(count($belajars) > 0) && !(count($tips) > 0) && !(count($infos) > 0))
            <h6 class="text-center red"><i>Sorry, data not found.</p>
                    @endif
        </div>
    </div>
</main>
@endsection