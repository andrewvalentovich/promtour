<form class="popup popup-record">
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__title">
                Кузница "Зов Огня и Металла”
            </div>
            <div class="popup__label-list">
                <label class="popup__label-list-item">
                    <span>
                        ФИО
                    </span>
                    <input>
                </label>
                <label class="popup__label-list-item date-picker">
                    <span>
                        Дата
                    </span>
                    <input type="text" id="datepicker">
                </label>
                <label class="popup__label-list-item dropdown-input dropdown-time" disabled="true">
                    <div class="dropdown-input__title">
                        <span>
                            Время
                        </span>
                        <input readonly id="time">
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
                        </span>
                        <input>
                    </label>
                    <div class="number-seats__info">
                        <div class="number-seats__info-item">
                            Мест свободно:
                            <b>
                                12
                            </b>
                        </div>
                        <div class="number-seats__info-item">
                            Всего мест:
                            <b>
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
