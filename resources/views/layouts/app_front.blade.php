<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/files/fonts/stylesheet.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    @vite(['resources/sass/app.scss'])
    @yield('styles')
    <title>Промтур</title>
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
