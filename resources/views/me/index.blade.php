@extends('layouts.app')

@section('meta_tags')
<title>About Kreatip</title>

<meta name='description' itemprop='description'
    content='Kreatip merupakan website yang menyediakan berbagai materi pembelajaran dari skill yang dibutuhkan para millenial dan generasi Z, isi artikelnya yang tidak terlalu kaku dapat mempermudah para pembaca memahi isi artikel website Kreatip. Selain pembelajaran, website kreatip pun menyediakan berbagai tips dan informasi yang dibutuhkan di kehidupan saat ini' />
<link rel="canonical" href="{{url()->current()}}" />

<meta property="og:site_name" content="Kreatip" />
<meta property="og:type" content="article" />
<meta property="og:title" content="About Kreatip" />
<meta property="og:locale" content="id_ID" />
<meta property="og:description"
    content="Kreatip merupakan website yang menyediakan berbagai materi pembelajaran dari skill yang dibutuhkan para millenial dan generasi Z, isi artikelnya yang tidak terlalu kaku dapat mempermudah para pembaca memahi isi artikel website Kreatip. Selain pembelajaran, website kreatip pun menyediakan berbagai tips dan informasi yang dibutuhkan di kehidupan saat ini" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:locale:alternate" content="en-us" />

<meta property='article:section' content='pembelajaran' />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="About Kreatip" />
<meta name="twitter:description"
    content="Kreatip merupakan website yang menyediakan berbagai materi pembelajaran dari skill yang dibutuhkan para millenial dan generasi Z, isi artikelnya yang tidak terlalu kaku dapat mempermudah para pembaca memahi isi artikel website Kreatip. Selain pembelajaran, website kreatip pun menyediakan berbagai tips dan informasi yang dibutuhkan di kehidupan saat ini" />
<meta name="twitter:image" content="https://kreatip.id/main/img/icon/kreatip.png" />
<meta name="twitter:site" content="{{url()->current()}}" />

@endsection

@section('main')

<!-- Me -->
<main id="main-me" class="row main-me">

    <div class="container">
        <div class="row me-caption">
            <div class="col-xl-3 col-l-4 col-md-4 col-sm-12 me-img pt-5">
                <h2>Kreatip</h2>
            </div>
            <div class="col-xl-9 col-l-8 col-md-8 col-sm-12 me-desc">
                {!! $blog->post !!}
            </div>
        </div>
    </div>

</main>

<!--Profile Card 3-->
<div class="container profile">
    <h3>Dibalik Kreatip :</h3>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-5">
        @foreach ($users as $user)
        <div class="col mb-4">
            <div class="card profile-card-3">
                <div class="background-block">
                    <img src="{{ asset('storage/profile/img/' . $user->img ) }}" alt="{{ $user->name }}"
                        class="background" />
                </div>
                <div class="card-content pt-0">
                    <h2 class="mb-3">{{ $user->name }}</h2>
                    @if ($user->name == 'Patra')
                    <h2 class="mb-3"><small>Owner, Developer, and Author Article</small></h2>
                    @else
                    <h2 class="mb-3"><small>Author Article</small></h2>
                    @endif
                    <a href="{{ url('https://instagram.com/' . $user->ig ) }}" target="_blank"><img
                            src="{{ asset('storage/profile/img/ig.png') }}" class="zoom" alt=""></a>
                    <a href="{{ url('https://fb.com/' . $user->fb ) }}" target="_blank"><img
                            src="{{ asset('storage/profile/img/fb.png') }}" class="zoom" alt=""></a>
                    <a href="{{ url('https://twitter.com/' . $user->twt ) }}" target="_blank"><img
                            src="{{ asset('storage/profile/img/twt.png') }}" class="zoom" alt=""></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Contact -->
<section id="contact" class="row contact">
    @if (session('status'))
    @endif
    <div class="flash-data" data-flashdata="{{ session('status') }}"></div>

    <div class="container contact-card">
        <div class="row">
            <div class="col-xl-4 col-l-4 col-md-4 col-sm-12 card-contact" data-aos="zoom-in" data-aos-duration="800">
                <div class="card">
                    <h1 class="text-center"><i class="far fa-envelope"></i></h1>
                    <div class="card-body">
                        <h2 class="text-center">Contact Me</h2>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-8 col-sm-12">
                <div class="neu-form text-center">
                    <form class="text-left form-contact" action="{{ url('/me') }}" method="post">
                        @csrf

                        <small>Jangan ragu untuk bertanya!</small> <br>
                        <div class="form-group input-contact mt-3">
                            <label for="name">Nama</label>
                            <input type="name" class="form-control" id="name" name="name" aria-describedby="name"
                                required>
                        </div>
                        <div class="form-group input-contact">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea type="message" class="form-control" id="message" name="message"
                                aria-describedby="message" required></textarea>
                            <small>This message will be send to <strong
                                    class="text-purple">patra@kreatip.id</strong></small>

                        </div>
                        <p>
                            <button type="submit" class="btn btn-contact">Submit</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section>


<!-- Me -->
<section id="credit" class="credit">

    <div class="container">
        <div class="row me-credit">
            <div class="col-xl-5 col-l-4 col-md-6 col-sm-12 me-img text-center">
                <img src="{{ asset('storage/landing/img/freepik.png') }}" alt="" height="200px">
            </div>
            <div class="col-xl-7 col-l-8 col-md-6 col-sm-12 me-desc">
                <h4>Credit</h4>
                <h6>Meskipun website ini di bangun oleh saya sendiri</h6>
                <h6>Namun ada beberapa gambar yang di gunakan dari pihak ke 3</h6>
                <h6>Berikut sumber gambar tersebut :</h6>
                <h6><a href="https://www.freepik.com/" class="text-purple" target="_blank">https://www.freepik.com/</a>
                </h6>
            </div>
        </div>
    </div>

</section>

@endsection