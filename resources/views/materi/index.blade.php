@extends('layouts.app')

@section('meta_tags')

<title>Belajar</title>

<meta name='description' itemprop='description'
    content='Area pembelajaran dari website Kreatip, disini terdapat berbagai materi dari beberapa skill yang dibutuhkan di dunia pekerjaan saat ini. Baik dari bidang IT, sastra bahasa, design, dan skill lainnya yang menarik untuk dipelajari' />
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:site_name" content="Kreatip" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Materi Pembelajaran" />
<meta property="og:locale" content="id_ID" />
<meta property="og:description"
    content="Area pembelajaran dari website Kreatip, disini terdapat berbagai materi dari beberapa skill yang dibutuhkan di dunia pekerjaan saat ini. Baik dari bidang IT, sastra bahasa, design, dan skill lainnya yang menarik untuk dipelajari" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:locale:alternate" content="en-us" />

<meta property='article:section' content='pembelajaran' />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="Materi Pembelajaran" />
<meta name="twitter:description"
    content="Area pembelajaran dari website Kreatip, disini terdapat berbagai materi dari beberapa skill yang dibutuhkan di dunia pekerjaan saat ini. Baik dari bidang IT, sastra bahasa, design, dan skill lainnya yang menarik untuk dipelajari" />
<meta name="twitter:image" content="https://kreatip.id/storage/landing/img/belajar.png" />
<meta name="twitter:site" content="{{url()->current()}}" />

@endsection

@section('main')

<!-- Main Menu -->
<main id="main-list" class="container main-list">
    <div class="row">

        <section id="pick-materi" class="col-12 col-sm-12 col-md-12 col-xl-9 pick-materi">
            <h2>Pilih Materi</h2>
            <small class="font-italic red">*Red for under construction</small>
            <br>
            <br>

            <!-- Materi satu -->
            @foreach ($categories as $category)
            <div class="container conten-card">
                <h3>{{ $category->category_name }}</h3>
                <div class="row row-cols-1 row-cols-md-3 card-deck card-pick">
                    @foreach ($category->materiSubcategories as $subcategory)
                    <a href="{{ url('materi') }}/{{ strtolower($subcategory->subcategory_name) }}" class="text-center">
                        <div class="mb-5 col mr-2">
                            <div class="card card-materi">
                                <h3><i
                                        class="{{ $subcategory->icon }} . ' ' . {{ ($subcategory->status == 0) ? 'red' : '' }}"></i>
                                </h3>
                                <div class="card-body">
                                    <h5 class="text-center  . ' ' . {{ ($subcategory->status == 0) ? 'red' : '' }}">
                                        {{ $subcategory->subcategory_name }}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </section>

        <aside id="sidebar-right" class="col-12 col-sm-12 col-md-12 col-xl-3 suggest-article">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-1">
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
                    <h4 class="mt-0 mb-3">Info</h4>
                    @foreach ($infos as $info)
                    @php
                    $title = explode(" ", $info->blog_title);
                    $jumlah = count($title);
                    $titik = '';
                    ($jumlah > 8 ) ? $titik='...' : '' ; $first_part=implode(" ", array_splice($title, 0, 8));
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