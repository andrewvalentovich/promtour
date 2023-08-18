@extends('layouts.app_front')
@section('content')
    <main>
        <div class="catalog container">
            <div class="catalog__sort">
                <div class="excursions__title title" style="font-size:38px;padding-right: 20px;">
                    Предприятия
                </div>
                <div class="sort close-out">
                    <span class="sort__title btn btn_green catalog__title_green">
                        <span>
                            Отрасль
                        </span>
                        <picture>
                            <source media="(max-width: 539px)" srcset="{{ Vite::asset('resources/images/icons/arrow-white_mob.svg') }}">
                            <img class="arrow" src="{{ Vite::asset('resources/images/icons/arrow-white.svg') }}" alt="стрелочка">
                        </picture>
                    </span>
                    <div class="sort__list">
                        @foreach($categories as $category)
                            <div class="sort__list-item">
                                <button data_name="category" data_id="{{ $category->id }}">{{ $category->name }}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="catalog__list excursion__card-list">
                @foreach($companies as $company)
                    <div class="excursion__card">
                        <div class="excursion__card-top">
                            <div class="excursion__card-pic">
                                <img src="{{ !count($company->photos) < 1 ? $company->photos[0]->photo_url : "" }}" alt="{{ $company->name }}">
                            </div>
                        </div>
                        <div class="excursion__card-text">
                            <div class="excursion__card-desc">
                                <h3>
                                    {{ $company->name }}
                                </h3>
                                <p class="excursion__card-lead">
                                    {{ $company->description }}
                                </p>
                            </div>
                            <div class="excursion__card-btns">
                                <a href="{{ route('company.detail', $company->slug) }}" class="excursion__card-btn btn btn_blue">
                                    Подробнее
                                </a>
                                <a href="{{ route('company.excursions', $company->slug) }}" class="excursion__card-btn btn btn_green">
                                    Выбрать тур
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
