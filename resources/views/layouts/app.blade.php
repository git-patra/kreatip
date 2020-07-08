<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @yield('meta_tags')
</head>

<body id="kreatip">

    {{-- Navbar --}}
    <nav id="nav" class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">Kreatip</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('materi*') ? 'active' : '' }}" href="/materi">Belajar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tips*') ? 'active' : '' }}" href="/tips">Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('info*') ? 'active' : '' }}" href="/info">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('me*') ? 'active' : '' }}" href="/me">Me</a>
                    </li>
                </ul>
                <button class="btn btn-search" type="button">Search <i class="fas fa-search"></i></button>
            </div>
        </div>
    </nav>

    {{-- Navbar Responsif --}}
    <nav id="nav-mobile" class="mobile-bottom-nav">
        <a href="/"
            class="mobile-bottom-nav__item mobile-bottom-nav__item {{ Request::is('/') ? 'mobile-bottom-nav__item--active' : '' }}">
            <div class="mobile-bottom-nav__item-content">
                <h5><i class="fas fa-home"></i></h5>
                Home
            </div>
        </a>
        <a href="/materi"
            class="mobile-bottom-nav__item {{ Request::is('materi*') ? 'mobile-bottom-nav__item--active' : '' }}">
            <div class="mobile-bottom-nav__item-content">
                <h5><i class="fab fa-leanpub"></i></h5>
                Belajar
            </div>
        </a>
        <a href="/tips"
            class="mobile-bottom-nav__item {{ Request::is('tips*') ? 'mobile-bottom-nav__item--active' : '' }}">
            <div class="mobile-bottom-nav__item-content">
                <h5><i class="far fa-lightbulb"></i></h5>
                Tips
            </div>
        </a>

        <a href="/info"
            class="mobile-bottom-nav__item {{ Request::is('info*') ? 'mobile-bottom-nav__item--active' : '' }}">
            <div class="mobile-bottom-nav__item-content">
                <h5><i class="far fa-newspaper"></i></h5>
                Info
            </div>
        </a>

        <a href="/me" class="mobile-bottom-nav__item {{ Request::is('me*') ? 'mobile-bottom-nav__item--active' : '' }}">
            <div class="mobile-bottom-nav__item-content">
                <h5><i class="fas fa-dog"></i></h5>
                Me
            </div>
        </a>
    </nav>

    <!-- Logo & Search -->
    <div id="logo-mobile" class="logo-mobile">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6">
                    <a href="/">Kreatip</a>
                </div>
                <div class="col-6 col-sm-6 text-right">
                    <button class="btn btn-search" type="button" id="search">
                        Search <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Nav Search --}}
    <nav id="desktop-navigation" class="navbar-expand-lg navbar-search">
        <div class="container">
            <form action="/search" method='get'>
                <input class="form-control" name="searchArtikel" id="searchInput" type="text"
                    placeholder="Cari Artikel">
            </form>
        </div>
    </nav>

    @yield('main')

    <!-- Return to Top -->
    <a href="javascript:" id="return-to-top" class="return-to-top"><i class="fas fa-chevron-up"></i></a>

    <!-- Footer Desktop -->
    <footer id="footer" class="row">
        <section id="main-footer" class="col-xl-12 footer">
            <section class="footer-contain">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                        <div class="col">
                            &copy;Copyright 2020 | <a href="{{ url('/me') }}">Patra</a>
                        </div>
                        <div class="col footer-nav">
                            <a href="{{ url('/terms') }}">Terms and Condition</a>
                            <a href="{{ url('/privacy') }}">Privacy Policy</a>
                            <a href="{{ url('/me') }}">Contact</a>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </footer>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="{{ asset('js/imagebox.js') }}"></script>

</body>

</html>