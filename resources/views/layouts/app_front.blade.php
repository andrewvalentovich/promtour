<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/files/fonts/stylesheet.css') }}">
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;700&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss'])
    @yield('styles')
    <title>TIUTOUR</title>
</head>
<body>
    <div class="wrapper">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    @vite(['resources/js/app.js'])
    @yield('scripts')
</body>
</html>
