<header class="header-w">
    <div class="header">
        <div class="header__content container">
            <a href="/" class="header__logo logo">
                <img src="{{ Vite::asset('resources/images/icons/map-point.svg') }}" alt="точка на карте">
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
            <div class="header__menu ">
                <div class="nav-icon toggle-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="header-m">
    <div class="header-m__content">
        <nav class="header-m__nav">
            <a class="header-m__nav-item" href="{{ route('company.index') }}">
                Предприятия
            </a>
            <a class="header-m__nav-item" href="{{ route('excursions.index') }}">
                Экскурсии
            </a>
            <a class="header-m__nav-item" href="#">
                Как записаться
            </a>
            <a class="header-m__nav-item" href="#">
                О проекте
            </a>
        </nav>
        <div class="header__auth">
            <a href="{{ route('register') }}" class="header__auth-item reg">
                Регистрация
            </a>
        </div>
        <div class="header__auth">
            <a href="{{ route('login') }}" class="header__auth-item log">
                Авторизация
            </a>
        </div>
        <div class="header-m__close toggle-menu ">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><script xmlns=""/>
                <path d="M1 1L13 13" stroke="#272727" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M13 1L1 13" stroke="#272727" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
        </div>
    </div>
</div>
