@extends('layouts.app_front')
@section('content')
<main>
    <div class="catalog container">
{{--        <div class="navigation">--}}
{{--            <a class="navigation__item" href="#">--}}
{{--                Главная--}}
{{--            </a>--}}
{{--            <a class="navigation__item" href="#">--}}
{{--                Предприятия--}}
{{--            </a>--}}
{{--            <a class="navigation__item" href="#">--}}
{{--                Промышленность--}}
{{--            </a>--}}
{{--            <a class="navigation__item" href="#">--}}
{{--                Экохимия--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="company">
            <div class="company__text">
                <div class="excursions__top">
                    <div class="excursions__title title">
                        {{ $excursion->name }}
                    </div>
                    <span class="btn btn_blue">
                        {{ is_null($excursion->category) ? "Нет категории" : $excursion->category->name }}
                    </span>
                </div>
                <p class="company__text-lead">
                    {{ $excursion->description }}
                </p>
                <div class="company__swiper-btns">
                    <div class="company__prev company__swiper-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <circle cx="13" cy="13" r="12.35" transform="matrix(-1 0 0 1 26 0)" stroke="#19657C" stroke-opacity="0.8" stroke-width="1.3"/>
                            <path d="M14.3263 17.5102L9.55078 12.7347L14.3263 7.95917" stroke="#19657C" stroke-opacity="0.8" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="company__next company__swiper-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                            <circle cx="13" cy="13" r="12.35" transform="matrix(-1 0 0 1 26 0)" stroke="#19657C" stroke-opacity="0.8" stroke-width="1.3"/>
                            <path d="M14.3263 17.5102L9.55078 12.7347L14.3263 7.95917" stroke="#19657C" stroke-opacity="0.8" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="company__swiper swiper">
                    <div class="company__swiper-wrapper swiper-wrapper">
                        @if(!count($excursion->photos) < 1)
                            @foreach($excursion->photos as $photo)
                                <div class="company__slide swiper-slide open-gallery">
                                    <img src="{{ asset($photo->photo_url) }}" alt="фото экскурсии">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="company__pagination swiper-pagination"></div>
                <button class="company__text-btn btn btn_green open-choice" data_id="{{ $excursion->id }}">
                    Записаться на экскурсию
                </button>
            </div>
            <div class="company__side">
                <div class="company__side-preview open-gallery">
                    <img src="{{ !count($excursion->photos) < 1 ? $excursion->photos[0]->photo_url : "" }}" alt="фото экскурсии">
                </div>
                <div class="company__side-list">
                    @if(!count($excursion->photos) < 1)
                        @foreach($excursion->photos as $photo)
                            @if($loop->index == 3)
                                <div class="company__side-item open-gallery">
                                    <img src="{{ asset($photo->photo_url) }}" alt="фото компании">
                                    <span>
                                        {{ !count($excursion->photos) - 4 }}+ фото
                                    </span>
                                </div>
                                @break
                            @else
                                <div class="company__side-item open-gallery">
                                    <img src="{{ asset($photo->photo_url) }}" alt="фото компании">
                                </div>
                            @endif
                        @endforeach
                    @else
                        {{ __('Нет фотографий') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- галерея -->
    <div class="gallery popup">
        <div class="gallery__content">
            <div class="gallery__swiper">
                <div class="gallery__swiper-list">
                    @if(!count($excursion->photos) < 1)
                        @foreach($excursion->photos as $photo)
                            <div class="gallery__swiper-slide swiper-slide {{ $loop->index == 0 ? "active" : "" }}">
                                <img src="{{ asset($photo->photo_url) }}" alt="фото компании">
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="gallery__swiper-prev gallery__swiper-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="27" viewBox="0 0 48 27" fill="none"><script xmlns=""/>
                        <path d="M2 25L22.5547 3.51098C23.3423 2.68757 24.6577 2.68757 25.4453 3.51098L46 25" stroke="white" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="gallery__swiper-next gallery__swiper-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="27" viewBox="0 0 48 27" fill="none"><script xmlns=""/>
                        <path d="M2 25L22.5547 3.51098C23.3423 2.68757 24.6577 2.68757 25.4453 3.51098L46 25" stroke="white" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
            <div class="gallery__list">
                @if(!count($excursion->photos) < 1)
                    @foreach($excursion->photos as $photo)
                        <div class="gallery__list-item">
                            <img src="{{ asset($photo->photo_url) }}" alt="фото компании">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="gallery__close close popup-close">

        </div>
    </div>
</main>
@endsection
