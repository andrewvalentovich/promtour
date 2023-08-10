import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

import './bootstrap';
import './jquery';
import './jquery-1.12.4'
import './jquery-ui'
// import './bodyScrollLock.min.js';


function changerActive(list) {
    for(let i = 0; i < list.length; i++) {
        list[i].classList.remove('active')
    }
    list = 0
}

//Popup close
document.addEventListener("click", function(event) {
        event = event || window.event;
        let target = event.target

        if(target.classList.contains('popup')) {
            target.classList.remove('active')
            bodyScrollLock.enableBodyScroll(target);
        }

        //закрытие меню кликом по темной области
        if(target.classList.contains('header-m')) {
            target.classList.remove('active')
            bodyScrollLock.enableBodyScroll(target);
            for (let i = 0; i < headerMenuBtn.length; i++) {
                headerMenuBtn[i].classList.toggle('open')
            }
        }


        //закрытие блоков close-out по клику вне
        if(!target.classList.contains('close-out') && !target.closest('.close-out')) {
            let closeOutBlock = document.querySelectorAll('.close-out')
            changerActive(closeOutBlock)
        }
    }

)

let popupClose = document.querySelectorAll('.popup-close')
for(let i=0 ; i < popupClose.length ; i++) {
    popupClose[i].addEventListener("click",
        function() {
            let popup = popupClose[i].closest('.popup')
            if(popup.classList.contains('filter')) {
                popup.classList.remove('popup')
            } else {
                popup.classList.remove('active')
            }
            bodyScrollLock.enableBodyScroll(popup);
        })
}
//слайдер на главной
const excursionSwiper = new Swiper('.excursion__swiper', {
    speed: 400,
    spaceBetween: 20,
    slidesPerView: 3,
    navigation: {
        nextEl: '.excursion__swiper-next',
        prevEl: '.excursion__swiper-prev',
    },
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        // when window width is >= 640px
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        }
    }
});

//слайдер на главной
const companySwiper = new Swiper('.company__swiper', {
    speed: 400,
    spaceBetween: 20,
    slidesPerView: 1,
    navigation: {
        nextEl: '.company__next',
        prevEl: '.company__prev',
    },
    pagination: {
        el: ".company__pagination",
    },
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
    }
});




// показать скрыть пароль
if(document.querySelectorAll('.eye').length) {
    const yey = document.querySelectorAll('.eye')

    yey.forEach(yey => {
        yey.addEventListener('click', function() {
            togglePassword(this)
        })
    });

    function togglePassword(eye) {
        const field = eye.closest('.input-password-w')
        const input = field.querySelector('input')
        const yeyOpen = field.querySelector('.eye_open')
        const yeyClose = field.querySelector('.eye_close')

        yeyOpen.classList.toggle('active')
        yeyClose.classList.toggle('active')

        if(!yeyOpen.classList.contains('active')) {
            input.setAttribute('type', 'text')
        } else {
            input.setAttribute('type', 'password')
        }
    }
}


//gallery swiper
if(document.querySelectorAll('.gallery__swiper').length) {
    const gallery = document.querySelector('.gallery')
    const miniImage = gallery.querySelectorAll('.gallery__swiper-slide')
    const bigImage = gallery.querySelectorAll('.gallery__list-item')
    const gallerySwiperList = gallery.querySelector('.gallery__swiper-list')
    const galleryPrevBtn = gallery.querySelector('.gallery__swiper-prev')
    const galleryNextBtn = gallery.querySelector('.gallery__swiper-next')
    let activeId = 0

    // открыть галарею по клику на фото
    const openGallery = document.querySelectorAll('.open-gallery')
    for(let i = 0; i < openGallery.length; i++) {
        openGallery[i].addEventListener('click', function() {
            gallery.classList.add('active')
            bodyScrollLock.disableBodyScroll(gallery);
        })
    }


    //скролл по кнопкам
    galleryPrevBtn.onclick = function() {
        if(activeId > 0) {
            changeActiveSlide(-1)
        } else {
            changeActiveSlide(miniImage.length-1)
        }
    }
    galleryNextBtn.onclick = function() {
        if(activeId < miniImage.length - 1) {
            changeActiveSlide(1)
        } else {
            changeActiveSlide(-miniImage.length+1)
        }
    }

    function changeActiveSlide(side) {
        activeId += side
        miniImage[activeId].scrollIntoView();
        bigImage[activeId].scrollIntoView();
        changerActive(miniImage)
        miniImage[activeId].classList.add('active')

    }
    //scroll by click in mini image
    for(let i = 0; i < miniImage.length; i++) {
        miniImage[i].addEventListener('click', function() {
            changerActive(miniImage)
            this.classList.add('active')
            activeId = i
            bigImage[i].scrollIntoView();
        })
    }


    // change mini images by scroll
    gallery.addEventListener('scroll', function(){
        for(let i = 0; i < bigImage.length; i++) {
            checkIfElementIs100pxBelowViewport(bigImage[i],i)
        }
    });


    function checkIfElementIs100pxBelowViewport(element,number) {
        const rect = element.getBoundingClientRect();
        const windowHeight = (window.innerHeight || document.documentElement.clientHeight);
        const isAboveMidpoint = rect.top < windowHeight / 2;
        const isBelowMidpoint = rect.bottom > windowHeight / 2;

        if (isAboveMidpoint && isBelowMidpoint) {
            activeId = number
            changerActive(miniImage)
            miniImage[number].classList.add('active')
            miniImage[number].scrollIntoView();
        }
    }

}


//enterprises__switch-btn
if(document.querySelectorAll('.enterprises__switch-btn').length) {
    const enterprisesSwitchBtn = document.querySelectorAll('.enterprises__switch-btn')
    enterprisesSwitchBtn.forEach(btn => {
        btn.addEventListener('click', function() {
            changerActive(enterprisesSwitchBtn)
            this.classList.add('active')
        })
    });
}

//скролл до блока по клику на ссылку
$(document).ready(function () {
    $('a[href^="#"]').on('click', function (event) {
        if(!this.classList.contains('scroll')) return
        event.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
});

//открытие sort блока
if(document.querySelectorAll('.sort').length) {
    const sort = document.querySelectorAll('.sort')
    sort.forEach(sortBlock => {
        sortBlock.addEventListener('click', function(e) {
            const target = e.target
            //открытие по title
            if(target.classList.contains('sort__title') || target.closest('.sort__title')) {
                sortBlock.classList.toggle('active')
                return
            }
            if(target.classList.contains('sort__list-item') || target.closest('.sort__list-item')) {
                const itemClicked = target.closest('.sort__list-item')
                const text = itemClicked.querySelector('span').innerHTML.trim()
                const title = sortBlock.querySelector('.sort__title').querySelector('span')
                title.innerHTML = text
                sortBlock.classList.remove('active')
                return
            }
        })
    });
}

//блок dropdown-input добавление в input из dropdown-input__list

if(document.querySelectorAll('.dropdown-input').length) {
    const dropdownInputBlock = document.querySelectorAll('.dropdown-input')

    dropdownInputBlock.forEach(parentBlock => {
        parentBlock.addEventListener('click', function(e) {
            const target = e.target
            e.preventDefault()
            if(parentBlock.getAttribute('disabled') === 'true') {
                return
            }
            if(target.classList.contains('dropdown-input__title') || target.closest('.dropdown-input__title')) {
                parentBlock.classList.toggle('active')
                return
            }
            if(target.classList.contains('dropdown-input__item') || target.closest('.dropdown-input__item')) {
                const itemClicked = target.closest('.dropdown-input__item')
                const text = itemClicked.querySelector('span').innerHTML.trim()
                const title = parentBlock.querySelector('.dropdown-input__title').querySelector('input')
                document.querySelector('.popup__left-participants-count').innerHTML = itemClicked.getAttribute('left');
                title.value = text
                parentBlock.classList.remove('active')
                return
            }

        })
    });
}

//бургер меню
let headerMenuBtn = document.querySelectorAll('.toggle-menu')
let mobileMenu = document.querySelector('.header-m')
for (let i = 0; i < headerMenuBtn.length; i++) {
    headerMenuBtn[i].addEventListener('click', function() {
        toggleMobileMenu()
    })
}

function toggleMobileMenu() {
    for (let i = 0; i < headerMenuBtn.length; i++) {
        headerMenuBtn[i].classList.toggle('open')
    }
    mobileMenu.classList.toggle('active')
}

// Size-control
window.addEventListener('resize', function(event){
    if(window.innerWidth >= 1024 && mobileMenu !== null) {
        mobileMenu.classList.remove('active')
        for (let i = 0; i < headerMenuBtn.length; i++) {
            headerMenuBtn[i].classList.remove('open')
        }
    }
})

//header-touch-swipe
function hedearMobileSwipeClose() {
    const headerMobile = document.querySelector('.header-m')
    const headerMobileContent = headerMobile.querySelector('.header-m__content')


    headerMobileContent.addEventListener('touchstart', handleTouchStart, false);
    headerMobileContent.addEventListener('touchmove', handleTouchMove, false);

    let xDown = null;
    let yDown = null;

    function handleTouchStart(evt) {
        xDown = evt.touches[0].clientX;
        yDown = evt.touches[0].clientY;
    };

    function handleTouchMove(evt) {
        if ( ! xDown || ! yDown ) {
            return;
        }

        let xUp = evt.touches[0].clientX;
        let yUp = evt.touches[0].clientY;

        let xDiff = xDown - xUp;
        let yDiff = yDown - yUp;
        if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
            if ( xDiff > 0 ) {
                headerMobile.classList.remove('active')
                for (let i = 0; i < headerMenuBtn.length; i++) {
                    headerMenuBtn[i].classList.toggle('open')
                }
                bodyScrollLock.enableBodyScroll(headerMobile);
            } else {
            }
        } else {
            if ( yDiff > 0 ) {
            } else {
            }
        }
        xDown = null;
        yDown = null;

    };
}
if(document.querySelectorAll('.header-m').length) {
    hedearMobileSwipeClose()
}

let eventInfo = []
async function getExcursion(id) {
    eventInfo.length = 0
    await $.ajax({
        url: '/api/excursion/schedule/',         /* Куда отправить запрос */
        method: 'post',             /* Метод запроса (post или get) */
        dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
        data: {excursion_id: id},     /* Данные передаваемые в массиве */
        success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
           console.log(data); /* В переменной data содержится ответ от index.php. */
           eventInfo = [...data]
           setInfoRecordPopup(data)
           disableLoader($('.popup-record'))
        }
    });
}

function setInfoRecordPopup(data) {
    const popupRecord = document.querySelector('.popup-record')
    const excursionName = popupRecord.querySelector('.popup__title')
    const participantsCount = popupRecord.querySelector('.popup__participants-count')
    const leftParticipantsCount = popupRecord.querySelector('.popup__left-participants-count')
    const hiddenInputExcursion = popupRecord.querySelector('input[name="excursion_id"]')
    const timeBlock = popupRecord.querySelector('.dropdown-time')
    const timeBlockList = popupRecord.querySelector('.dropdown-input__list')

    //название мероприятия
    excursionName.innerHTML = data[0].name
    participantsCount.innerHTML = data[0].max_participants_count
    leftParticipantsCount.innerHTML = data[0].max_participants_count
    hiddenInputExcursion.value = data[0].excursion_id
    setAvailableDates(data)

    timeBlockList.innerHTML = ''
    eventInfo[1].forEach(el => {
        let div = document.createElement('div')
        div.classList.add('dropdown-input__item')
        div.setAttribute('date', el.date)
        div.setAttribute('time', el.time)
        div.setAttribute('left', el.left_participants_count)

        let span = document.createElement('span')
        span.classList.add('text')

        span.innerHTML = el.time

        div.appendChild(span)

        timeBlockList.appendChild(div)
    });
}

// открытие попапа записаться
if(document.querySelectorAll('.open-choice').length) {
    const excursionCardBtn = document.querySelectorAll('.open-choice')
    const popupRecord = document.querySelector('.popup-record')
    excursionCardBtn.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = (btn.closest('.excursion__card') === null) ? btn.getAttribute('data_id') : btn.closest('.excursion__card').getAttribute('data_id')
            getExcursion(id)
            popupRecord.classList.add('active')
            if(popupRecord.getAttribute('event-data_id') !== id) {
                clearDataPopup(popupRecord)
            }
            popupRecord.setAttribute('event-data_id',id)
        })
    });
}

//убрать прелоудер и покзать контент в попапе
function disableLoader(popup) {
    const $popup = $(popup);
    const $loader = $popup.find('.lds-spinner');
    const $content = $popup.find('.popup__content');
    $loader.removeClass('active');
    $content.addClass('active');
}

//массив с доступными датами для календаря
let availableDates = [];
function setAvailableDates(data) {
    const datesInfo = [...data[1]]
    availableDates.length = 0
    datesInfo.forEach(el => {
        availableDates.push(el.date)
    });
}

//функция для добавления времени на выбранную дату
function setTimeOfCurrentDate(currentDate) {
    const timeBlock = document.querySelector('.dropdown-time')
    const input = timeBlock.querySelector('input')
    input.value = ''
    let availableTimes = [];

    //убираем disabled
    timeBlock.setAttribute('disabled', 'false')

    const dropdownTimeItems = document.querySelectorAll('.dropdown-input__item')
    dropdownTimeItems.forEach(el => {
        if(el.getAttribute('date') === currentDate) {
            el.classList.add('active')
        } else [
            el.classList.remove('active')
        ]
    });
}

function clearDataPopup(popup) {
    const $popup = $(popup);
    const $loader = $popup.find('.lds-spinner');
    const $content = $popup.find('.popup__content');
    const $datepicker = $popup.find('#datepicker');
    const $time = $popup.find('#time');


    $loader.addClass('active');
    $content.removeClass('active');

    $time.val('')
    $datepicker.val('')
}

//календарь
/* Локализация datepicker */
$.datepicker.regional['ru'] = {
	closeText: 'Закрыть',
	prevText: 'Предыдущий',
	nextText: 'Следующий',
	currentText: 'Сегодня',
	monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
	monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
	dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
	dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
	dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
	weekHeader: 'Не',
	dateFormat: 'dd.mm.yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['ru']);


$(function(){
	$("#datepicker").datepicker({
        onSelect: function(date){
            setTimeOfCurrentDate(date)
        },
        beforeShowDay: function(date){
			var string = jQuery.datepicker.formatDate('dd.mm.yy', date);
			return [availableDates.indexOf(string) !== -1];
		},
    });

});

// Отправка формы popup
$(".popup__btn[type='submit']").click(function (xhr) {
    xhr.preventDefault();
    var formData = new FormData($('.popup-record')[0]);
    var site_url = $('input[name="site_url"]').val();
    var matches = $('input[name="booking_date"]').val().split(".");
    var booking_date = matches[2]+"-"+matches[1]+"-"+matches[0];

    formData.delete('site_url');
    formData.set('booking_date', booking_date);

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: site_url+`api/booking`,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('.popup__error').text("");
        },
        success: function (response) {
            if( response.status === 422 ) {
                // var errors = $.parseJSON(response.errors.responseText);
                console.log(response.errors);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "-error").text(val[0]);
                });
            } else {
                alert('Вы записаны на экскурсию!');
                $('.popup').removeClass('active');
            }
        }
    }, "json")
})
