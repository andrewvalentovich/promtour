@extends('layouts.app_front')

@section('content')
    <main>
        <div class="preview">
            <div class="preview__content ">
                <div class="preview__text">
                    <h1>
                        Экскурсии
                    </h1>
                    <h2>
                        В Мир Производства!
                    </h2>
                    <p class="preview__text-lead">
                        Откройте тайны Ярославского производства в уникальных экскурсиях. История и инновации в гармонии. Регистрируйтесь сейчас!
                    </p>
                    <div class="preview__text-points">
                        <picture>
                            <source media="(max-width: 539px)" srcset="{{ Vite::asset('resources/images/icons/points_mob.svg') }}">
                            <img src="{{ Vite::asset('resources/images/icons/points.svg') }}" alt="точки">
                        </picture>
                    </div>
                    <a href="#excursion" class="preview__text-btn scroll">
							<span class="btn btn_green">
								Выбрать тур
							</span>
                        <img src="{{ Vite::asset('resources/images/icons/arrow_blue_down.svg') }}" alt="стрелочка">
                    </a>
                </div>
                <div class="preview__pic">
                    <picture>
                        <source media="(max-width: 1023px)" srcset="{{ Vite::asset('resources/images/icons/preview-pic_mob.svg') }}">
                        <img src="{{ Vite::asset('resources/images/icons/preview-pic.png') }}" alt="картинка">
                    </picture>
                </div>
            </div>
            <div class="preview__line"></div>
            <svg class="curved curved-top" width="203" height="99" viewBox="0 0 203 99" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M201.477 1.03052C201.477 1.03052 198.009 102.659 -44 97.7387" stroke="#336A89" stroke-width="1.9655" stroke-miterlimit="10" stroke-dasharray="7.01 7.01"/>
            </svg>
            <svg class="curved curved-right" width="39" height="313" viewBox="0 0 39 313" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M39.4091 1C39.4091 1 -48.4487 127.625 43.245 311.893" stroke="#336A89" stroke-width="1.9655" stroke-miterlimit="10" stroke-dasharray="7.01 7.01"/>
            </svg>
            <svg class="curved curved-left" width="61" height="341" viewBox="0 0 61 341" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 1C10.2641 2.16667 29.9428 22.7 26.5451 95.5C23.1473 168.3 42.3541 209.167 52.3823 220.5C64.534 235.333 71.07 280 0 340" stroke="#336A89" stroke-width="1.97" stroke-dasharray="9 9"/>
            </svg>
            <img class="airplane" src="{{ Vite::asset('resources/images/icons/airplane.svg') }}" alt="самолет">
        </div>
        <div class="excursion" id="excursion">
            <div class="excursion__subtitle subtitle">
                САМЫЕ ПОПУЛЯРНЫЕ
            </div>
            <div class="excursion__title title">
                Топ Экскурсий
            </div>
            <div class="excursion__swiper-w">
                <button class="excursion__swiper-next excursion__swiper-btn">
                    <img src="{{ Vite::asset('resources/images/icons/arrow-blue-slider.svg') }}" alt="стрелочка">
                </button>
                <button class="excursion__swiper-prev excursion__swiper-btn">
                    <img src="{{ Vite::asset('resources/images/icons/arrow-blue-slider.svg') }}" alt="стрелочка">
                </button>
                <div class="excursion__swiper swiper">
                    <div class="swiper-wrapper">

                        <div class="excursion__slide swiper-slide">
                            <div class="excursion__card" data_id='4'>
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
                        </div>

                        <div class="excursion__slide swiper-slide">
                            <div class="excursion__card" data_id='2'>
                                <div class="excursion__card-top">
                                    <div class="excursion__card-pic">
                                        <img src="{{ Vite::asset('resources/images/pic/card-2.png') }}" alt="вкусные тайны">
                                    </div>
                                    <div class="excursion__card-hashtags">
                                        <div class="excursion__card-hashtag">
												<span>
													12+
												</span>
                                        </div>
                                        <div class="excursion__card-hashtag _green">
                                            <div class="excursion__card-hashtag-icon">
                                                <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                            </div>
                                            <span>
													2 ч
												</span>
                                        </div>
                                        <div class="excursion__card-hashtag _yellow">
                                            <div class="excursion__card-hashtag-icon">
                                                <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                            </div>
                                            <span>
													4 - 10 чел
												</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="excursion__card-text">
                                    <div class="excursion__card-desc">
                                        <h3>
                                            Кузница "Зов Огня и Металла”
                                        </h3>
                                        <p class="excursion__card-lead">

                                            Вас ждет захватывающее зрелище мастерства кузнецов, которые создают изящные металлические шедевры...
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
                        <div class="excursion__slide swiper-slide">
                            <div class="excursion__card">
                                <div class="excursion__card-top">
                                    <div class="excursion__card-pic">
                                        <img src="{{ Vite::asset('resources/images/pic/card-3.png') }}" alt="вкусные тайны">
                                    </div>
                                    <div class="excursion__card-hashtags">
                                        <div class="excursion__card-hashtag">
												<span>
													10+
												</span>
                                        </div>
                                        <div class="excursion__card-hashtag _green">
                                            <div class="excursion__card-hashtag-icon">
                                                <img src="{{ Vite::asset('resources/images/icons/clock.svg') }}" alt="количество часов">
                                            </div>
                                            <span>
													2 ч
												</span>
                                        </div>
                                        <div class="excursion__card-hashtag _yellow">
                                            <div class="excursion__card-hashtag-icon">
                                                <img src="{{ Vite::asset('resources/images/icons/people.svg') }}" alt="количество человек">
                                            </div>
                                            <span>
													6 - 20 чел
												</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="excursion__card-text">
                                    <div class="excursion__card-desc">
                                        <h3>
                                            Текстильная Фабрика
                                        </h3>
                                        <p class="excursion__card-lead">
                                            Посетите ткацкие цехи и узнайте о том, как из мягкой пряжи возникают красочные ткани...
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
                        <div class="excursion__slide swiper-slide">
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
                        </div>
                    </div>
                </div>
                <div class="excursion__article">
						<span>
							Листай вправо
						</span>
                    <svg width="27" height="8" viewBox="0 0 27 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.3536 4.35355C26.5488 4.15829 26.5488 3.84171 26.3536 3.64645L23.1716 0.464466C22.9763 0.269204 22.6597 0.269204 22.4645 0.464466C22.2692 0.659728 22.2692 0.976311 22.4645 1.17157L25.2929 4L22.4645 6.82843C22.2692 7.02369 22.2692 7.34027 22.4645 7.53553C22.6597 7.7308 22.9763 7.7308 23.1716 7.53553L26.3536 4.35355ZM0 4.5L26 4.5V3.5L0 3.5L0 4.5Z" fill="#19657C"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="about container">
            <div class="about__content">
                <div class="about__content-text">
                    <div class="about__subtitle subtitle">
                        О ПРОЕКТЕ
                    </div>
                    <div class="about__title title">
                        Магия Производства
                    </div>
                    <p class="about__lead">
                        Экскурсии интересны и для взрослых, и для детей. Взрослые узнают об истории и технологиях, дети получат увлекательные и интерактивные впечатления.
                    </p>
                    <div class="about__achievements-list">
                        <div class="about__achievements-item">
								<span>
									20К+
								</span>
                            <p>
                                Довольных клиентов
                            </p>
                        </div>
                        <div class="about__achievements-item">
								<span>
									50+
								</span>
                            <p>
                                Видов экскурсий
                            </p>
                        </div>
                        <div class="about__achievements-item">
								<span>
									5+
								</span>
                            <p>
                                Развитых городов
                            </p>
                        </div>
                    </div>
                    <button class="about__btn btn btn_green">
                        Выбрать тур
                    </button>
                </div>
                <div class="about__content-pic">
                    <img src="{{ Vite::asset('resources/images/icons/about-pic.svg') }}" alt="о нас картинка">
                </div>
            </div>
        </div>
        <div class="enterprises container">
            <div class="enterprises__title title">
                Предприятия
            </div>
            <div class="enterprises__lead">
                В этом блоке вы найдете список впечатляющих предприятий, которые стали партнерами и клиентами нашей компании.
            </div>
            <div class="enterprises__switch-btns">
                <button class="enterprises__switch-btn btn btn_blue">
                    Все
                </button>
                <button class="enterprises__switch-btn btn btn_blue">
                    Технологии
                </button>
                <button class="enterprises__switch-btn btn btn_blue">
                    Туризм
                </button>
                <button class="enterprises__switch-btn btn btn_blue">
                    Образование
                </button>
                <button class="enterprises__switch-btn btn btn_blue active">
                    Промышленность
                </button>
                <button class="enterprises__switch-btn btn btn_blue">
                    Благотворительность
                </button>
            </div>
            <div class="enterprises__gallery">
                <div class="enterprises__gallery-left">
                    <div class="enterprises__gallery-left-vertical">
                        <div class="enterprises__gallery-item _gorizontal-mini">
                            <img src="{{ Vite::asset('resources/images/pic/gallery-1.png') }}" alt="предприятие">
                            <div class="enterprises__gallery-item-text">
                                <b>
                                    Продуктовед
                                </b>
                                <span>
										Пищевая компания
									</span>
                            </div>
                        </div>
                        <div class="enterprises__gallery-item _gorizontal-mini">
                            <img src="{{ Vite::asset('resources/images/pic/gallery-2.png') }}" alt="предприятие">
                            <div class="enterprises__gallery-item-text">
                                <b>
                                    Экохимия
                                </b>
                                <span>
										Химический завод
									</span>
                            </div>
                        </div>
                    </div>
                    <div class="enterprises__gallery-item _vertical">
                        <img src="{{ Vite::asset('resources/images/pic/gallery-3.png') }}" alt="предприятие">
                        <div class="enterprises__gallery-item-text">
                            <b>
                                АвтоМастер
                            </b>
                            <span>
									Автомобильный завод
								</span>
                        </div>
                    </div>
                </div>
                <div class="enterprises__gallery-right">
                    <div class="enterprises__gallery-item _gorizontal">
                        <img src="{{ Vite::asset('resources/images/pic/gallery-4.png') }}" alt="предприятие">
                        <div class="enterprises__gallery-item-text">
                            <b>
                                ТехноМех
                            </b>
                            <span>
									Машиностроительное предприятие
								</span>
                        </div>
                    </div>
                    <div class="enterprises__gallery-item _vertical-mini">
                        <img src="{{ Vite::asset('resources/images/pic/gallery-5.png') }}" alt="предприятие">
                        <div class="enterprises__gallery-item-text">
                            <b>
                                Стилланд
                            </b>
                            <span>
									Металлургический комбинат
								</span>
                        </div>
                    </div>
                    <div class="enterprises__gallery-item _vertical-mini">
                        <img src="{{ Vite::asset('resources/images/pic/gallery-6.png') }}" alt="предприятие">
                        <div class="enterprises__gallery-item-text">
                            <b>
                                Тканево
                            </b>
                            <span>
									Текстильная фабрика
								</span>
                        </div>
                    </div>
                </div>
            </div>
            <button class="enterprises__all-btn btn btn_green">
                Смотреть все
            </button>
        </div>
        <div class="enroll container">
            <div class="enroll__title title">
                Как записаться
            </div>
            <div class="enroll__content">
                <div class="enroll__content-item">
                    <div class="enroll__content-pic">
                        <img src="{{ Vite::asset('resources/images/icons/research.svg') }}" alt="выбор">
                    </div>
                    <div class="enroll__content-subtitle">
                        Выбор
                    </div>
                    <p class="enroll__content-lead">
                        Просмотрите список доступных экскурсий на нашем сайте и выберите ту, которая вас заинтересовала. Мы предлагаем разнообразные программы, чтобы удовлетворить различные интересы и предпочтения.
                    </p>
                </div>
                <div class="enroll__content-item">
                    <div class="enroll__content-pic">
                        <img src="{{ Vite::asset('resources/images/icons/calendar.svg') }}" alt="расписание">
                    </div>
                    <div class="enroll__content-subtitle">
                        расписание
                    </div>
                    <p class="enroll__content-lead">
                        Убедитесь, что выбранная вами экскурсия доступна в удобное для вас время. Мы стараемся предоставить гибкое расписание, чтобы каждый мог найти удобное время для посещения.
                    </p>
                </div>
                <div class="enroll__content-item">
                    <div class="enroll__content-pic">
                        <img src="{{ Vite::asset('resources/images/icons/registration.svg') }}" alt="ЗАЯВКА">
                    </div>
                    <div class="enroll__content-subtitle">
                        ЗАЯВКА
                    </div>
                    <p class="enroll__content-lead">
                        На странице каждой экскурсии вы найдете заявку на участие. Заполните необходимую информацию о себе и указывайте количество участников.
                    </p>
                </div>
                <div class="enroll__content-item">
                    <div class="enroll__content-pic">
                        <img src="{{ Vite::asset('resources/images/icons/task-list.svg') }}" alt="подтверждение">
                    </div>
                    <div class="enroll__content-subtitle">
                        подтверждение
                    </div>
                    <p class="enroll__content-lead">
                        После заполнения заявки наш менеджер свяжется с вами для подтверждения деталей и уточнения условий. Мы также ответим на все ваши вопросы и предоставим дополнительную информацию.
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection
