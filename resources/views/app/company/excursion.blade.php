@extends('layouts.app_front')
@section('content')
    <main>
        <div class="catalog container">
            <div class="excursions__top">
                <div class="excursions__title title" style="font-size:38px;">
                    Экскурсии
                </div>
                <span class="btn btn_blue">
                    {{ $category }}
                </span>
            </div>
            <div class="catalog__list excursion__card-list">
                @foreach($excursions as $excursion)
                    <div class="excursion__card" data_id="{{ $excursion->id }}">
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
                                    {{ Str::limit($excursion->description, 40) }}
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
