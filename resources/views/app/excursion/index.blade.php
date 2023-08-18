@extends('layouts.app_front')
@section('content')
    <main>
        <div class="catalog container">
            <div class="catalog__sort">
                <div class="excursions__title title" style="font-size:38px;padding-right: 20px;">
                    Экскурсии
                </div>
                <div class="sort close-out">
                    <span class="sort__title btn btn_green catalog__title_green">
                        <span>
                            @if(isset($_GET['category']))
                                @if($_GET['category'] == "false")
                                    Без категории
                                @else
                                    @foreach($categories as $category)
                                        <span>{{ $category->id == $_GET['category'] ? $category->name : "" }}</span>
                                    @endforeach
                                @endif
                            @else
                                Отрасль
                            @endif
                        </span>
                        <picture>
                            <source media="(max-width: 539px)" srcset="{{ Vite::asset('resources/images/icons/arrow-white_mob.svg') }}">
                            <img class="arrow" src="{{ Vite::asset('resources/images/icons/arrow-white.svg') }}" alt="стрелочка">
                        </picture>
                    </span>
                    <div class="sort__list">
                        <div class="sort__list-item">
                            <span data_name="category" data_id="false">Без категории</span>
                        </div>
                        @foreach($categories as $category)
                            <div class="sort__list-item">
                                <span data_name="category" data_id="{{ $category->id }}">{{ $category->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="sort close-out">
                    <span class="sort__title btn btn_blue-dark catalog__title_blue-dark">
                        <span>
                            @if(isset($_GET['age_limit']))
                                @if($_GET['age_limit'] == "false")
                                    Без ограничения
                                @else
                                    @foreach($age_limit_arr as $age_limit)
                                        <span>{{ $age_limit == $_GET['age_limit'] ? $age_limit."+" : "" }}</span>
                                    @endforeach
                                @endif
                            @else
                                Возрастное ограничение
                            @endif
                        </span>
                        <picture>
                            <source media="(max-width: 539px)" srcset="{{ Vite::asset('resources/images/icons/arrow-white_mob.svg') }}">
                            <img class="arrow" src="{{ Vite::asset('resources/images/icons/arrow-white.svg') }}" alt="стрелочка">
                        </picture>
                    </span>
                    <div class="sort__list">
                        <div class="sort__list-item">
                            <span data_name="age_limit" data_id="false">Без ограничения</span>
                        </div>
                        @foreach($age_limit_arr as $age_limit)
                            <div class="sort__list-item">
                                <span data_name="age_limit" data_id="{{ $age_limit }}">{{ $age_limit }}+</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="catalog__list excursion__card-list">
                @if(count($excursions) < 1)
                    <p>Экскурсий нет</p>
                @else
                    @foreach($excursions as $excursion)
                        <a href="{{ route('excursion.detail', $excursion->slug) }}" class="excursion__card" data_id="{{ $excursion->id }}">
                            <div class="excursion__card-top">
                                <div class="excursion__card-pic">
                                    <img src="{{ !count($excursion->photos) < 1 ? $excursion->photos[0]->photo_url : "" }}" alt="{{ $excursion->name }}">
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
                                        {{ $excursion->description }}
                                    </p>
                                </div>
                                <div class="excursion__card-btns">
                                    <div class="excursion__card-btn btn btn_blue">
                                        Подробнее
                                    </div>
                                    <button class="excursion__card-btn btn btn_green open-choice">
                                        Выбрать тур
                                    </button>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
