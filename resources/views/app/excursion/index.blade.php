@extends('layouts.app_front')
@section('content')
    <main>
        <div class="catalog container">
            <div class="navigation">
                <a class="navigation__item" href="/">
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
            <div class="catalog__sort">
                <div class="sort close-out">
                    <button class="sort__title btn btn_green catalog__title_green">
							<span>
								Отрасль
							</span>
                        <picture>
                            <source media="(max-width: 539px)" srcset="{{ Vite::asset('resources/images/icons/arrow-white_mob.svg') }}">
                            <img class="arrow" src="{{ Vite::asset('resources/images/icons/arrow-white.svg') }}" alt="стрелочка">
                        </picture>
                    </button>
                    <div class="sort__list">
                        <div class="sort__list-item">
								<span>
									Отрасль1
								</span>
                        </div>
                        <div class="sort__list-item">
								<span>
								Отрасль2
								</span>
                        </div>
                        <div class="sort__list-item">
								<span>
								Отрасль3
								</span>
                        </div>
                    </div>
                </div>
                <div class="sort close-out">
                    <button class="sort__title btn btn_blue-dark catalog__title_blue-dark">
							<span>
								Предприятия
							</span>
                        <picture>
                            <source media="(max-width: 539px)" srcset="{{ Vite::asset('resources/images/icons/arrow-white_mob.svg') }}">
                            <img class="arrow" src="{{ Vite::asset('resources/images/icons/arrow-white.svg') }}" alt="стрелочка">
                        </picture>
                    </button>
                    <div class="sort__list">
                        <div class="sort__list-item">
								<span>
								Предприятия1
								</span>
                        </div>
                        <div class="sort__list-item">
								<span>
								Предприятия2
								</span>
                        </div>
                        <div class="sort__list-item">
								<span>
								Предприятия3
								</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="catalog__list excursion__card-list">
                @foreach($excursions as $excursion)
                    <div  class="excursion__card" data_id="{{ $excursion->id }}">
                        <div class="excursion__card-top">
                            <div class="excursion__card-pic">
                                <img src="{{ Vite::asset('resources/images/pic/card-1.png') }}" alt="вкусные тайны">
                            </div>
                            <div class="excursion__card-hashtags">
                                <div class="excursion__card-hashtag">
                                    <span>
                                        {{ $excursion->age_limit }}+
                                    </span>
                                </div>
                                <div class="excursion__card-hashtag _green">
                                    <div class="excursion__card-hashtag-icon">
                                        <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                    </div>
                                    <span>
                                        {{ (int) $excursion->duration }} ч
                                    </span>
                                </div>
                                <div class="excursion__card-hashtag _yellow">
                                    <div class="excursion__card-hashtag-icon">
                                        <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                    </div>
                                    <span>
                                        0 - {{ $excursion->max_participants_count_group }} чел
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="excursion__card-text">
                            <div class="excursion__card-desc">
                                <h3>
                                    {{ $excursion->name }}
                                </h3>
                                <p class="excursion__card-lead">
                                    {{ Str::limit($excursion->description, 80) }}
                                </p>
                            </div>
                            <div class="excursion__card-btns">
                                <a href="{{ route('excursion.detail', $excursion->slug) }}" class="excursion__card-btn btn btn_blue">
                                    Подробнее
                                </a>
                                <button class="excursion__card-btn btn btn_green open-choice">
                                    Выбрать тур
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
