@extends('layouts.app_front')
@section('content')
    <main>
        <div class="catalog container">
            <div class="navigation">
                <a class="navigation__item" href="#">
                    Главная
                </a>
                <a class="navigation__item" href="#">
                    Предприятия
                </a>
                <a class="navigation__item" href="#">
                    Промышленность
                </a>
                <a class="navigation__item" href="#">
                    Экохимия
                </a>
                <a class="navigation__item" href="#">
                    Экскурсии
                </a>
            </div>
            <div class="excursions__top">
                <div class="excursions__title title">
                    Экохимия
                </div>
                <span class="btn btn_blue">
						Промышленность
					</span>
            </div>
            <div class="catalog__list excursion__card-list">
                <div class="excursion__card">
                    <div class="excursion__card-top">
                        <div class="excursion__card-pic">
                            <img src="{{ Vite::asset('resources/images/pic/card-1.png') }}" alt="вкусные тайны">
                        </div>
                        <div class="excursion__card-hashtags">
                            <div class="excursion__card-hashtag">
									<span>
										8+
									</span>
                            </div>
                            <div class="excursion__card-hashtag _green">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                </div>
                                <span>
										1,5 ч
									</span>
                            </div>
                            <div class="excursion__card-hashtag _yellow">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                </div>
                                <span>
										5 - 15 чел
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="excursion__card-text">
                        <div class="excursion__card-desc">
                            <h3>
                                Сыроварня "Вкусные Тайны"
                            </h3>
                            <p class="excursion__card-lead">
                                Откройте для себя процесс создания настоящего сыра с традиционными и современными методами...
                            </p>
                        </div>
                        <div class="excursion__card-btns">
                            <a href="#" class="excursion__card-btn btn btn_blue">
                                Подробнее
                            </a>
                            <button class="excursion__card-btn btn btn_green open-choice">
                                Выбрать тур
                            </button>
                        </div>
                    </div>
                </div>
                <div class="excursion__card">
                    <div class="excursion__card-top">
                        <div class="excursion__card-pic">
                            <img src="{{ Vite::asset('resources/images/pic/card-2.png') }}" alt="вкусные тайны">
                        </div>
                        <div class="excursion__card-hashtags">
                            <div class="excursion__card-hashtag">
									<span>
										8+
									</span>
                            </div>
                            <div class="excursion__card-hashtag _green">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                </div>
                                <span>
										1,5 ч
									</span>
                            </div>
                            <div class="excursion__card-hashtag _yellow">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                </div>
                                <span>
										5 - 15 чел
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="excursion__card-text">
                        <div class="excursion__card-desc">
                            <h3>
                                Сыроварня "Вкусные Тайны"
                            </h3>
                            <p class="excursion__card-lead">
                                Откройте для себя процесс создания настоящего сыра с традиционными и современными методами...
                            </p>
                        </div>
                        <div class="excursion__card-btns">
                            <a href="#" class="excursion__card-btn btn btn_blue">
                                Подробнее
                            </a>
                            <button class="excursion__card-btn btn btn_green open-choice">
                                Выбрать тур
                            </button>
                        </div>
                    </div>
                </div>
                <div class="excursion__card">
                    <div class="excursion__card-top">
                        <div class="excursion__card-pic">
                            <img src="{{ Vite::asset('resources/images/pic/card-3.png') }}" alt="вкусные тайны">
                        </div>
                        <div class="excursion__card-hashtags">
                            <div class="excursion__card-hashtag">
									<span>
										8+
									</span>
                            </div>
                            <div class="excursion__card-hashtag _green">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                </div>
                                <span>
										1,5 ч
									</span>
                            </div>
                            <div class="excursion__card-hashtag _yellow">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                </div>
                                <span>
										5 - 15 чел
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="excursion__card-text">
                        <div class="excursion__card-desc">
                            <h3>
                                Сыроварня "Вкусные Тайны"
                            </h3>
                            <p class="excursion__card-lead">
                                Откройте для себя процесс создания настоящего сыра с традиционными и современными методами...
                            </p>
                        </div>
                        <div class="excursion__card-btns">
                            <a href="#" class="excursion__card-btn btn btn_blue">
                                Подробнее
                            </a>
                            <button class="excursion__card-btn btn btn_green open-choice">
                                Выбрать тур
                            </button>
                        </div>
                    </div>
                </div>
                <div class="excursion__card">
                    <div class="excursion__card-top">
                        <div class="excursion__card-pic">
                            <img src="{{ Vite::asset('resources/images/pic/card-1.png') }}" alt="вкусные тайны">
                        </div>
                        <div class="excursion__card-hashtags">
                            <div class="excursion__card-hashtag">
									<span>
										8+
									</span>
                            </div>
                            <div class="excursion__card-hashtag _green">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                </div>
                                <span>
										1,5 ч
									</span>
                            </div>
                            <div class="excursion__card-hashtag _yellow">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                </div>
                                <span>
										5 - 15 чел
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="excursion__card-text">
                        <div class="excursion__card-desc">
                            <h3>
                                Сыроварня "Вкусные Тайны"
                            </h3>
                            <p class="excursion__card-lead">
                                Откройте для себя процесс создания настоящего сыра с традиционными и современными методами...
                            </p>
                        </div>
                        <div class="excursion__card-btns">
                            <a href="#" class="excursion__card-btn btn btn_blue">
                                Подробнее
                            </a>
                            <button class="excursion__card-btn btn btn_green open-choice">
                                Выбрать тур
                            </button>
                        </div>
                    </div>
                </div>
                <div class="excursion__card">
                    <div class="excursion__card-top">
                        <div class="excursion__card-pic">
                            <img src="{{ Vite::asset('resources/images/pic/card-2.png') }}" alt="вкусные тайны">
                        </div>
                        <div class="excursion__card-hashtags">
                            <div class="excursion__card-hashtag">
									<span>
										8+
									</span>
                            </div>
                            <div class="excursion__card-hashtag _green">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                </div>
                                <span>
										1,5 ч
									</span>
                            </div>
                            <div class="excursion__card-hashtag _yellow">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                </div>
                                <span>
										5 - 15 чел
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="excursion__card-text">
                        <div class="excursion__card-desc">
                            <h3>
                                Сыроварня "Вкусные Тайны"
                            </h3>
                            <p class="excursion__card-lead">
                                Откройте для себя процесс создания настоящего сыра с традиционными и современными методами...
                            </p>
                        </div>
                        <div class="excursion__card-btns">
                            <a href="#" class="excursion__card-btn btn btn_blue">
                                Подробнее
                            </a>
                            <button class="excursion__card-btn btn btn_green open-choice">
                                Выбрать тур
                            </button>
                        </div>
                    </div>
                </div>
                <div class="excursion__card">
                    <div class="excursion__card-top">
                        <div class="excursion__card-pic">
                            <img src="{{ Vite::asset('resources/images/pic/card-3.png') }}" alt="вкусные тайны">
                        </div>
                        <div class="excursion__card-hashtags">
                            <div class="excursion__card-hashtag">
									<span>
										8+
									</span>
                            </div>
                            <div class="excursion__card-hashtag _green">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                </div>
                                <span>
										1,5 ч
									</span>
                            </div>
                            <div class="excursion__card-hashtag _yellow">
                                <div class="excursion__card-hashtag-icon">
                                    <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                </div>
                                <span>
                                    5 - 15 чел
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="excursion__card-text">
                        <div class="excursion__card-desc">
                            <h3>
                                Сыроварня "Вкусные Тайны"
                            </h3>
                            <p class="excursion__card-lead">
                                Откройте для себя процесс создания настоящего сыра с традиционными и современными методами...
                            </p>
                        </div>
                        <div class="excursion__card-btns">
                            <a href="#" class="excursion__card-btn btn btn_blue">
                                Подробнее
                            </a>
                            <button class="excursion__card-btn btn btn_green open-choice">
                                Выбрать тур
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
