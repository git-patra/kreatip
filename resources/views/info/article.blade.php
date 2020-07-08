@extends('layouts.app')
@extends('layouts.meta')

@section('main')
<main id="info" class="container info">
    <!-- Page -->
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 info-filter">
        @if ($category->category_name === 'Beasiswa')
        <div class="col">
            <select id="select-pelajar" class="custom-select">
                <option value="undefined" selected disabled>Pilih Pelajar</option>
                @foreach ($pelajars as $pelajar)
                <option value="{{ $pelajar->pelajar_name }}">{{ $pelajar->pelajar_name }}</option>
                @endforeach
            </select><span>*</span>
        </div>
        <div class="col">
            <select id="select-benua" class="custom-select">
                <option value="undefined" selected disabled>Pilih Benua</option>
                @foreach ($continents as $continent)
                <option value="{{ $continent->continent_name }}">{{ $continent->continent_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select id="select-negara" class="custom-select">
                <option value="undefined" selected disabled>Pilih Negara</option>
                @foreach ($countries as $country)
                <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                @endforeach
            </select><span>*</span>
        </div>
        <div class="col">
            <button id="btnFilter-info" class="btn btn-filter btn-outline-secondary" type="button">Filter</button>
        </div>
        @endif

        @if ($category->category_name === 'Pelatihan')
        <div class="col">
            <select id="select-keahlian" class="custom-select">
                <option value="undefined" selected disabled>Pilih Keahlian</option>
                @foreach ($pelatihans as $pelatihan)
                <option value="{{ $pelatihan->subcategory_name }}">{{ $pelatihan->subcategory_name }}</option>
                @endforeach
            </select><span>*</span>
        </div>
        <div class="col">
            <select id="select-subkeahlian" class="custom-select">
                <option value="undefined" selected disabled>Pilih Cabang Keahlian</option>
                @foreach ($courses as $course)
                <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                @endforeach
            </select><span>*</span>
        </div>
        <div class="col">
            <button id="btnFilter-info" class="btn btn-filter btn-outline-secondary" type="button">Filter</button>
        </div>
        @endif
    </div>

    <div class="row">
        <article id="info-article" class="col-xl-9 col-lg-8  col-md-12 info-article">

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
                <img src="{{ asset('storage/info/img/'.$article->img_thumb)}}"
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