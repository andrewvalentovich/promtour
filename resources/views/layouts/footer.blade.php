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
                <a class="header__nav-item" href="{{ route('catalog.index') }}">
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
<form class="popup popup-record">
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__title">
                Кузница "Зов Огня и Металла”
            </div>
            <div class="popup__label-list">
                <label class="popup__label-list-item">
                    <span>
                        ФИО
                    </span>
                    <input>
                </label>
                <label class="popup__label-list-item date-picker">
                    <span>
                        Дата
                    </span>
                    <input type="date">
                </label>
                <label class="popup__label-list-item dropdown-input">
                    <div class="dropdown-input__title">
                        <span>
                            Время
                        </span>
                        <input readonly>
                    </div>
                    <div class="dropdown-input__list">
                        <div class="dropdown-input__item">
                            <span class="text">
                                в 16:00, 2 часа
                            </span>
                        </div>
                        <div class="dropdown-input__item">
                            <span class="text">
                                в 16:00, 3 часа
                            </span>
                        </div>
                        <div class="dropdown-input__item">
                            <span class="text">
                                в 16:00, 4 часа
                            </span>
                        </div>
                        <div class="dropdown-input__item">
                            <span class="text">
                                в 16:00, 5 часа
                            </span>
                        </div>
                        <div class="dropdown-input__item">
                            <span class="text">
                                в 16:00, 6 часа
                            </span>
                        </div>
                        <div class="dropdown-input__item">
                            <span class="text">
                                в 16:00, 6 часа
                            </span>
                        </div>
                    </div>
                </label>
                <div class="number-seats">
                    <label class="popup__label-list-item ">
                        <span>
                            Количество мест
                        </span>
                        <input>
                    </label>
                    <div class="number-seats__info">
                        <div class="number-seats__info-item">
                            Мест свободно:
                            <b>
                                12
                            </b>
                        </div>
                        <div class="number-seats__info-item">
                            Всего мест:
                            <b>
                                32
                            </b>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="popup__btn btn btn_green">
                Записаться
            </button>
            <div class="popup-close">

            </div>
        </div>
    </div>
</form>
