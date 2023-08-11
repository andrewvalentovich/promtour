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
                @foreach($companies as $company)
                    <div class="excursion__card">
                        <div class="excursion__card-top">
                            <div class="excursion__card-pic">
                                <img src="{{ is_array($company->photos) ? $company->photos[0]->photo_url : "" }}" alt="вкусные тайны">
                            </div>
                        </div>
                        <div class="excursion__card-text">
                            <div class="excursion__card-desc">
                                <h3>
                                    {{ $company->name }}
                                </h3>
                                <p class="excursion__card-lead">
                                    {{ Str::limit($company->description, 80) }}
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
