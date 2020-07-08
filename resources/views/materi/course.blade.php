@extends('layouts.app')

@section('meta_tags')

<title>Pilih Mata Pelajaran</title>

<meta name='description' itemprop='description'
    content='Area pemilihan materi pembelajaran, kalian tinggal memilih materi yang ingin dipelajari dibagian sidebar kiri atau dibagian atas untuk tampilan mobile' />
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:site_name" content="Kreatip" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Pilih Mata Pelajaran" />
<meta property="og:locale" content="id_ID" />
<meta property="og:description"
    content="Area pemilihan materi pembelajaran, kalian tinggal memilih materi yang ingin dipelajari dibagian sidebar kiri atau dibagian atas untuk tampilan mobile," />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:locale:alternate" content="en-us" />

<meta property='article:section' content='pembelajaran' />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="Pilih Mata Pelajaran" />
<meta name="twitter:description"
    content="Area pemilihan materi pembelajaran, kalian tinggal memilih materi yang ingin dipelajari dibagian sidebar kiri atau dibagian atas untuk tampilan mobile" />
<meta name="twitter:image" content="https://kreatip.id/storage/landing/img/belajar.png" />
<meta name="twitter:site" content="{{url()->current()}}" />

@endsection

@section('main')
<section id="map" class="map">
    <div class="container">
        <ul>
            <li><a href="/materi">Materi</a></li>
            <li>\</li>
            <li><a
                    href="/materi/{{ strtolower($subcategory->subcategory_name) }}">{{ $subcategory->subcategory_name }}</a>
            </li>
        </ul>
    </div>
</section>

<main id="materi" class="container materi">
    <div class="row">
        <aside id="sidebar-left" class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 sidebar-left">
            <div class="sticky-top">
                <h4>Daftar Materi</h4>

                {{-- Filter Materi --}}
                <input id="search-materi" type="text" class="form-control" placeholder="Search Materi">
                <select id="select-course" class="custom-select" name="selectCourse">
                    <option selected disabled>Select Materi</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                    @endforeach
                </select>

                {{-- List Materi --}}
                <div id="list-materi" class="list-materi">
                    <ul>
                    </ul>
                </div>
            </div>

        </aside>
        <article id="article-materi" class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 materi-article text-center">
            {{-- Description --}}
            <h3>Selamat Datang di Area Pembelajaran</h3>
            <br>
            <p>Anda sudah memilih <strong>{{ $subcategory->subcategory_name }}</strong> sebagai mata pelajaran yang
                ingin anda pelajari
            </p>Sekarang anda tinggal memilih <strong>materi</strong> yang ingin dipelajari dibagian <strong>sidebar
                kiri</strong> atau dibagian <strong>atas</strong> untuk tampilan mobile
        </article>
    </div>
</main>
@endsection