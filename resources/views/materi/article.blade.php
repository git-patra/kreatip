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
            <li>\</li>
            <li><a
                    href="/materi/{{ $subcategory->subcategory_name }}/{{ $article->bab_mapel }}">{{ $article->bab_mapel }}</a>
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
                <input id="search-materi2" type="text" class="form-control" placeholder="Search Materi">
                <select id="select-course2" class="custom-select" name="selectCourse">
                    @foreach ($courses as $co)
                    <option {{ ($co->id === $course->id) ? 'selected' : '' }} value="{{ $co->course_name_alias }}">
                        {{ $co->course_name_alias }}</option>
                    @endforeach
                </select>

                {{-- List Materi --}}
                <div id="list-materi2" class="list-materi">
                    <ul>
                        @foreach ($articles as $art)
                        @php
                        $course = strtolower(str_replace(' ', '-', $art->materiCourse->course_name_alias));
                        $title = strtolower(str_replace(' ', '-', $art->bab_mapel));
                        $puretitle = $art->bab_mapel;
                        @endphp
                        <li class="{{ ($puretitle === $article->bab_mapel ) ? 'focus' : '' }}">
                            <a class="{{ ($puretitle === $article->bab_mapel ) ? 'active' : '' }}"
                                href="/materi/{{ $course }}/{{ $title }}">
                                {{ $art->bab_mapel }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </aside>

        <article id="materi-article" class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            <div class="materi-article">
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
                    <img src="{{ asset('storage/materi/img/'.$article->img_thumb)}}"
                        alt="{{ $article->blog_title }} - kreatip.id" title="{{ $article->blog_title }}">
                </p>
                <p class="text-center p-img"><small class="font-italic">{{ $article->img_source }}</small></p>

                <br>
                {!! $article->blog_post !!}

                <div class="suggest-article">
                    <h3 class="mt-4 mb-4">Artikel Lainnya :</h3>
                    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                        <div class="col">
                            <h4 class="mb-3">Tips</h4>
                            @foreach ($tips as $tip)
                            @php
                            $title = explode(" ", $tip->blog_title);
                            $jumlah = count($title);
                            $titik = '';
                            ($jumlah > 8 ) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 8));
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

                        <div class="col">
                            <h4 class=" mb-3">Info</h4>
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
                </div>

            </div>

        </article>
    </div>
</main>
@endsection