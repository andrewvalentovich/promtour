<footer class="footer-w">
    <div class="header">
        <div class="header__content container">
            <a href="/" class="header__logo logo">
                <picture>
                    <source media="(max-width: 539px)" srcset="{{ Vite::asset('resources/images/icons/map-point_lite.svg') }}">
                    <img src="{{ Vite::asset('resources/images/icons/map-point.svg') }}" alt="точка на карте">
                </picture>
                <span>
                    ПРОМТУР
                </span>
            </a>
            <nav class="header__nav nav">
                <a class="header__nav-item" href="{{ route('company.index') }}">
                    Предприятия
                </a>
                <a class="header__nav-item" href="{{ route('excursions.index') }}">
                    Экскурсии
                </a>
                <a class="header__nav-item" href="#">
                    Как записаться
                </a>
                <a class="header__nav-item" href="#">
                    О проекте
                </a>
            </nav>
            <div class="header__auth">
                <a href="{{ route('register') }}" class="header__auth-item reg">
                    Регистрация/
                </a>
                <a href="{{ route('login') }}" class="header__auth-item log">
                    Авторизация
                </a>
            </div>
            <div class="header__menu">
                <div class="nav-icon toggle-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__article">
        @2023 Все права защищены
    </div>
</footer>
@include('layouts.popup')
