<form class="popup popup-record">

    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__title">
                Кузница "Зов Огня и Металла”
            </div>
            <input type="hidden" name="site_url" id="site_url" value="{{ config('app.url') }}">

            <input type="hidden" name="excursion_id" id="excursion_id" value="">
            <label id="excursion_id-error" class="popup__error" for="excursion_id"></label>

            <input type="hidden" name="user_id" id="user_id" value="{{ !is_null(auth()->user()) ? auth()->user()->id : '' }}">
            <label id="user_id-error" class="popup__error" for="user_id"></label>

            <div class="popup__label-list">
                <label class="popup__label-list-item">
                    <span>
                        ФИО
                        <label id="name_error" for="name"></label>
                    </span>
                    <input type="text" value="{{ !is_null(auth()->user()) ? auth()->user()->name : '' }}">
                </label>
                <label class="popup__label-list-item date-picker">
                    <span>
                        Дата
                        <label id="booking_date-error" class="popup__error" for="booking_date"></label>
                    </span>
                    <input type="text" name="booking_date" id="datepicker">
                </label>
                <label class="popup__label-list-item dropdown-input dropdown-time" disabled="true">
                    <div class="dropdown-input__title">
                        <span>
                            Время
                            <label id="booking_time-error" class="popup__error" for="booking_time"></label>
                        </span>
                        <input readonly type="text" name="booking_time" id="time">
                    </div>
                    <div class="dropdown-input__list">
                        <!-- <div class="dropdown-input__item">
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
                        </div> -->
                    </div>
                </label>
                <div class="number-seats">
                    <label class="popup__label-list-item ">
                        <span>
                            Количество мест
                            <label id="participants_count-error" class="popup__error" for="participants_count"></label>
                        </span>
                        <input type="text" name="participants_count">
                    </label>
                    <div class="number-seats__info">
                        <div class="number-seats__info-item">
                            Мест свободно:
                            <b class="popup__left-participants-count">
                                12
                            </b>
                        </div>
                        <div class="number-seats__info-item">
                            Всего мест:
                            <b class="popup__participants-count">
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
        <!-- loader -->
        <div class="lds-spinner active"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
</form>
