<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title>Kreatip</title>
</head>

<body class="auth" style="background-image: url('{{ asset('img/wp.jpg') }}')">
    <form id="logout-form" action="{{ url('/di8qb_logout') }}" method="POST">
        @csrf
    </form>
    @yield('main')

    <main id="dashboard" class="dashboard">
        @yield('topbar')
        @yield('sidenav')
        @yield('content')
    </main>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        // Ckeditor
        CKEDITOR.replace("kontenpost", {
            uiColor: "#FC8F9C",
            height: "27em",
            filebrowserUploadUrl:
                "{{ route('upload.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: "form"
        });
    </script>
</body>

</html>