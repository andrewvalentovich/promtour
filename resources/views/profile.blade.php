@extends('layouts.app_front')
@section('content')
<main>
    <div class="profile container">
        <div class="profile__content">
            <div class="profile__info">
                <div class="profile__me">
                    <img class="settings-mob" src="{{ Vite::asset('resources/images/icons/settings-blue.svg') }}" alt="Настройки">
                    <div class="profile__me-avatar">
                        <img src="{{ Vite::asset('resources/images/pic/avatar.svg') }}" alt="аватарка">
                    </div>
                    <div class="profile__me-data">
                        <div class="profile__me-name">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="profile__me-list">
                            <div class="profile__me-list-item">
                                <div class="icon">
                                    <img src="{{ Vite::asset('resources/images/icons/point-me.svg') }}" alt="точка на карте">
                                </div>
                                <span>
                                    Ярославль
                                </span>
                            </div>
                            <div class="profile__me-list-item">
                                <div class="icon">
                                    <img src="{{ Vite::asset('resources/images/icons/phone-call.svg') }}" alt="телефон">
                                </div>
                                <span>
                                    Телефон подтвержден
                                </span>
                            </div>
                            <div class="profile__me-list-item">
                                <div class="icon">
                                    <img src="{{ Vite::asset('resources/images/icons/clock 1.svg') }}" alt="часы">
                                </div>
                                <span>
                                    На сайте с {{ date("d.m.Y", strtotime(auth()->user()->created_at)) }}
                                </span>
                            </div>
                            <div class="profile__me-list-item">
                                <div class="icon">
                                    <img src="{{ Vite::asset('resources/images/icons/Ellipse 5.svg') }}" alt="статус">
                                </div>
                                <span>
                                    Онлайн
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile__action">
                    <button class="profile__action-btn green">
                        <div class="icon">
                            <img src="{{ Vite::asset('resources/images/icons/calendar-me.svg') }}" alt="календарь">
                        </div>
                        <span>
									Мои мероприятия
								</span>
                    </button>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="profile__action-btn blue">
                        <div class="icon">
                            <img src="{{ Vite::asset('resources/images/icons/settings1.svg') }}" alt="календарь">
                        </div>
                        <span>
{{--                            Настройки аккаунта--}}
                            {{ __('Выйти из учётной записи') }}
                        </span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="profile__events">
                <div class="profile__events-top">
                    <div class="profile__events-title">
                        Мои мероприятия
                    </div>
                    <div class="profile__events-sort sort close-out">
                        <div class="profile__sort-title sort__title">
                            Сортировать по
                            <span>
										Дате
									</span>
                            <svg class="arrow arrow-pc" xmlns="http://www.w3.org/2000/svg" width="11" height="6" viewBox="0 0 11 6" fill="none">
                                <path d="M10.2365 0.134519L5.49952 4.91646L0.762546 0.134519C0.677912 0.0489095 0.564298 0.000981443 0.44599 0.000981443C0.327682 0.000981443 0.214068 0.0489095 0.129434 0.134519C0.0884543 0.176101 0.0558984 0.225731 0.0336731 0.280506C0.0114478 0.335281 0 0.394097 0 0.453511C0 0.512925 0.0114478 0.571742 0.0336731 0.626516C0.0558984 0.681291 0.0884543 0.730922 0.129434 0.772503L5.16874 5.86067C5.25724 5.95 5.37593 6 5.49952 6C5.6231 6 5.74179 5.95 5.83029 5.86067L10.8696 0.773485C10.9109 0.731873 10.9437 0.68212 10.9661 0.627164C10.9885 0.572207 11 0.513162 11 0.453511C11 0.393861 10.9885 0.334815 10.9661 0.279859C10.9437 0.224903 10.9109 0.17515 10.8696 0.133538C10.785 0.0479276 10.6713 0 10.553 0C10.4347 0 10.3211 0.0479276 10.2365 0.133538V0.134519Z" fill="#19657C" fill-opacity="0.8"/>
                            </svg>
                            <svg class="arrow arrow-mob" xmlns="http://www.w3.org/2000/svg" width="6" height="3" viewBox="0 0 6 3" fill="none">
                                <path d="M5.61824 0.0672597L3.24976 2.45823L0.881273 0.0672597C0.838956 0.0244547 0.782149 0.000490721 0.722995 0.000490721C0.663841 0.000490721 0.607034 0.0244547 0.564717 0.0672597C0.544227 0.0880503 0.527949 0.112866 0.516837 0.140253C0.505724 0.16764 0.5 0.197049 0.5 0.226756C0.5 0.256463 0.505724 0.285871 0.516837 0.313258C0.527949 0.340645 0.544227 0.365461 0.564717 0.386252L3.08437 2.93034C3.12862 2.975 3.18797 3 3.24976 3C3.31155 3 3.3709 2.975 3.41514 2.93034L5.9348 0.386743C5.95543 0.365936 5.97183 0.34106 5.98303 0.313582C5.99423 0.286104 6 0.256581 6 0.226756C6 0.19693 5.99423 0.167407 5.98303 0.139929C5.97183 0.112451 5.95543 0.087575 5.9348 0.0667688C5.89248 0.0239638 5.83567 0 5.77652 0C5.71737 0 5.66056 0.0239638 5.61824 0.0667688V0.0672597Z" fill="#19657C" fill-opacity="0.8"/>
                            </svg>
                        </div>
                        <div class="sort__list">
                            <div class="sort__list-item">
										<span>
											Названию
										</span>
                            </div>
                            <div class="sort__list-item">
										<span>
											Возрастанию
										</span>
                            </div>
                            <div class="sort__list-item">
										<span>
											Убыванию
										</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile__events-list">
                    @if(count($bookings) == 0)
                        {{ __('Вы не записаны ни на одну экскурсию') }}
                    @else
                    @foreach($bookings as $booking)
                    <div class="profile__events-item">
                        <div class="profile__events-item-side">
                            <div class="profile__events-item-pic">
                                <img src="{{ Vite::asset('resources/images/pic/event.png') }}" alt="мероприятие">
                            </div>
                            <div class="profile__events-item-text">
                                <div class="profile__events-item-name">
                                    {{ $booking->excursion->name }}
                                </div>
                                <div class="excursion__card-hashtags">
                                    <div class="excursion__card-hashtag">
                                        <span>
                                            {{ $booking->excursion->age_limit }}+
                                        </span>
                                    </div>
                                    <div class="excursion__card-hashtag _green">
                                        <div class="excursion__card-hashtag-icon">
                                            <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                        </div>
                                        <span>
                                            {{ (int) date("H", strtotime($booking->excursion->duration)) }} ч
                                        </span>
                                    </div>
                                    <div class="excursion__card-hashtag _yellow">
                                        <div class="excursion__card-hashtag-icon">
                                            <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                        </div>
                                        <span>
                                            {{ $booking->participants_count }} чел
                                        </span>
                                    </div>
                                </div>
                                <div class="excursion__card-item-date-mob">
                                    <span>
                                        {{ date("d.m.Y", strtotime($booking->booking_date)) }}
                                    </span>
                                    <span>
                                        {{ date("H:i", strtotime($booking->booking_time)) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="profile__events-item-date">
                            <div class="profile__events-date-title">
                                Дата и время:
                            </div>
                            <div class="profile__events-date-info">
                                <span>
                                    {{ date("d.m.Y", strtotime($booking->booking_date)) }}
                                </span>
                                <span>
                                    {{ date("H:i", strtotime($booking->booking_time)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="profile__events-bottom">
                    <button class="profile__events-more-btn">
                        Показать еще
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
