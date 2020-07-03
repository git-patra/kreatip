@extends('layouts.app')

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
                    <option value="{{ $course->course_name_alias }}">{{ $course->course_name_alias }}</option>
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