@extends('layouts.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card mt-3 card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <h2 class="m-0">Создание записи на экскурсию</h2>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.users.bookings.store', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{ $user_id }}" name="user_id" class="form-control" placeholder="id пользователя">
                                @error('user_id')
                                <label class="text-danger font-weight-normal" for="user_id">{{ $message }}</label>
                                @enderror

                                <input type="hidden" value="{{ $excursion_id }}" name="excursion_id" class="form-control" placeholder="Id экскурсии">
                                @error('excursion_id')
                                <label class="text-danger font-weight-normal" for="excursion_id">{{ $message }}</label>
                                @enderror

                                <div class="form-group">
                                    <label class="font-weight-normal" for="select_date">Выберите дату записи</label>
                                    <select id="select_date" name="booking_date" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Выберите дату записи</option>
                                        @foreach($excursion->dates as $schedule)
                                            <option data-day="{{ $schedule["day_of_the_week"] }}" value="{{ $schedule["date"] }}">{{ $schedule["date"] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal" for="select_date">Выберите время записи</label>
                                    <select id="select_time" name="booking_time" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Выберите время записи</option>
                                        @foreach($excursion->decode_schedule as $index => $schedule)
                                            @if(empty($schedule))
                                                <option data-time="{{ $index }}" class="time_none" disabled>На этот день записи нет</option>
                                            @endif
                                            @foreach($schedule as $time)
                                                    <option data-time="{{ $index }}" class="time_none" value="{{ $time }}">{{ $time }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-normal" for="participants_count">Укажите количество человек в группе (максимум - {{ $excursion->max_participants_count_client }})</label>
                                    <input type="text" id="participants_count" value="{{ old('participants_count') }}" name="participants_count" class="form-control" placeholder="Количество участников группы">
                                    @error('participants_count')
                                    <label class="text-danger font-weight-normal" for="participants_count">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Создать">
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <style>
        .time_none {
            display: none;
        }
    </style>
    <style>
        /*!
 * Datepicker for Bootstrap v1.5.0 (https://github.com/eternicode/bootstrap-datepicker)
 *
 * Copyright 2012 Stefan Petre
 * Improvements by Andrew Rowls
 * Licensed under the Apache License v2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 */
        .datepicker {
            padding: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            direction: ltr;
        }
        .datepicker-inline {
            width: 220px;
        }
        .datepicker.datepicker-rtl {
            direction: rtl;
        }
        .datepicker.datepicker-rtl table tr td span {
            float: right;
        }
        .datepicker-dropdown {
            top: 0;
            left: 0;
        }
        .datepicker-dropdown:before {
            content: '';
            display: inline-block;
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-bottom: 7px solid #999999;
            border-top: 0;
            border-bottom-color: rgba(0, 0, 0, 0.2);
            position: absolute;
        }
        .datepicker-dropdown:after {
            content: '';
            display: inline-block;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #ffffff;
            border-top: 0;
            position: absolute;
        }
        .datepicker-dropdown.datepicker-orient-left:before {
            left: 6px;
        }
        .datepicker-dropdown.datepicker-orient-left:after {
            left: 7px;
        }
        .datepicker-dropdown.datepicker-orient-right:before {
            right: 6px;
        }
        .datepicker-dropdown.datepicker-orient-right:after {
            right: 7px;
        }
        .datepicker-dropdown.datepicker-orient-bottom:before {
            top: -7px;
        }
        .datepicker-dropdown.datepicker-orient-bottom:after {
            top: -6px;
        }
        .datepicker-dropdown.datepicker-orient-top:before {
            bottom: -7px;
            border-bottom: 0;
            border-top: 7px solid #999999;
        }
        .datepicker-dropdown.datepicker-orient-top:after {
            bottom: -6px;
            border-bottom: 0;
            border-top: 6px solid #ffffff;
        }
        .datepicker > div {
            display: none;
        }
        .datepicker table {
            margin: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .datepicker td,
        .datepicker th {
            text-align: center;
            width: 20px;
            height: 20px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            border: none;
        }
        .table-striped .datepicker table tr td,
        .table-striped .datepicker table tr th {
            background-color: transparent;
        }
        .datepicker table tr td.day:hover,
        .datepicker table tr td.day.focused {
            background: #eeeeee;
            cursor: pointer;
        }
        .datepicker table tr td.old,
        .datepicker table tr td.new {
            color: #999999;
        }
        .datepicker table tr td.disabled,
        .datepicker table tr td.disabled:hover {
            background: none;
            color: #999999;
            cursor: default;
        }
        .datepicker table tr td.highlighted {
            background: #d9edf7;
            border-radius: 0;
        }
        .datepicker table tr td.today,
        .datepicker table tr td.today:hover,
        .datepicker table tr td.today.disabled,
        .datepicker table tr td.today.disabled:hover {
            background-color: #fde19a;
            background-image: -moz-linear-gradient(to bottom, #fdd49a, #fdf59a);
            background-image: -ms-linear-gradient(to bottom, #fdd49a, #fdf59a);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fdd49a), to(#fdf59a));
            background-image: -webkit-linear-gradient(to bottom, #fdd49a, #fdf59a);
            background-image: -o-linear-gradient(to bottom, #fdd49a, #fdf59a);
            background-image: linear-gradient(to bottom, #fdd49a, #fdf59a);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fdd49a', endColorstr='#fdf59a', GradientType=0);
            border-color: #fdf59a #fdf59a #fbed50;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            color: #000;
        }
        .datepicker table tr td.today:hover,
        .datepicker table tr td.today:hover:hover,
        .datepicker table tr td.today.disabled:hover,
        .datepicker table tr td.today.disabled:hover:hover,
        .datepicker table tr td.today:active,
        .datepicker table tr td.today:hover:active,
        .datepicker table tr td.today.disabled:active,
        .datepicker table tr td.today.disabled:hover:active,
        .datepicker table tr td.today.active,
        .datepicker table tr td.today:hover.active,
        .datepicker table tr td.today.disabled.active,
        .datepicker table tr td.today.disabled:hover.active,
        .datepicker table tr td.today.disabled,
        .datepicker table tr td.today:hover.disabled,
        .datepicker table tr td.today.disabled.disabled,
        .datepicker table tr td.today.disabled:hover.disabled,
        .datepicker table tr td.today[disabled],
        .datepicker table tr td.today:hover[disabled],
        .datepicker table tr td.today.disabled[disabled],
        .datepicker table tr td.today.disabled:hover[disabled] {
            background-color: #fdf59a;
        }
        .datepicker table tr td.today:active,
        .datepicker table tr td.today:hover:active,
        .datepicker table tr td.today.disabled:active,
        .datepicker table tr td.today.disabled:hover:active,
        .datepicker table tr td.today.active,
        .datepicker table tr td.today:hover.active,
        .datepicker table tr td.today.disabled.active,
        .datepicker table tr td.today.disabled:hover.active {
            background-color: #fbf069 \9;
        }
        .datepicker table tr td.today:hover:hover {
            color: #000;
        }
        .datepicker table tr td.today.active:hover {
            color: #fff;
        }
        .datepicker table tr td.range,
        .datepicker table tr td.range:hover,
        .datepicker table tr td.range.disabled,
        .datepicker table tr td.range.disabled:hover {
            background: #eeeeee;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }
        .datepicker table tr td.range.today,
        .datepicker table tr td.range.today:hover,
        .datepicker table tr td.range.today.disabled,
        .datepicker table tr td.range.today.disabled:hover {
            background-color: #f3d17a;
            background-image: -moz-linear-gradient(to bottom, #f3c17a, #f3e97a);
            background-image: -ms-linear-gradient(to bottom, #f3c17a, #f3e97a);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f3c17a), to(#f3e97a));
            background-image: -webkit-linear-gradient(to bottom, #f3c17a, #f3e97a);
            background-image: -o-linear-gradient(to bottom, #f3c17a, #f3e97a);
            background-image: linear-gradient(to bottom, #f3c17a, #f3e97a);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3c17a', endColorstr='#f3e97a', GradientType=0);
            border-color: #f3e97a #f3e97a #edde34;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }
        .datepicker table tr td.range.today:hover,
        .datepicker table tr td.range.today:hover:hover,
        .datepicker table tr td.range.today.disabled:hover,
        .datepicker table tr td.range.today.disabled:hover:hover,
        .datepicker table tr td.range.today:active,
        .datepicker table tr td.range.today:hover:active,
        .datepicker table tr td.range.today.disabled:active,
        .datepicker table tr td.range.today.disabled:hover:active,
        .datepicker table tr td.range.today.active,
        .datepicker table tr td.range.today:hover.active,
        .datepicker table tr td.range.today.disabled.active,
        .datepicker table tr td.range.today.disabled:hover.active,
        .datepicker table tr td.range.today.disabled,
        .datepicker table tr td.range.today:hover.disabled,
        .datepicker table tr td.range.today.disabled.disabled,
        .datepicker table tr td.range.today.disabled:hover.disabled,
        .datepicker table tr td.range.today[disabled],
        .datepicker table tr td.range.today:hover[disabled],
        .datepicker table tr td.range.today.disabled[disabled],
        .datepicker table tr td.range.today.disabled:hover[disabled] {
            background-color: #f3e97a;
        }
        .datepicker table tr td.range.today:active,
        .datepicker table tr td.range.today:hover:active,
        .datepicker table tr td.range.today.disabled:active,
        .datepicker table tr td.range.today.disabled:hover:active,
        .datepicker table tr td.range.today.active,
        .datepicker table tr td.range.today:hover.active,
        .datepicker table tr td.range.today.disabled.active,
        .datepicker table tr td.range.today.disabled:hover.active {
            background-color: #efe24b \9;
        }
        .datepicker table tr td.selected,
        .datepicker table tr td.selected:hover,
        .datepicker table tr td.selected.disabled,
        .datepicker table tr td.selected.disabled:hover {
            background-color: #9e9e9e;
            background-image: -moz-linear-gradient(to bottom, #b3b3b3, #808080);
            background-image: -ms-linear-gradient(to bottom, #b3b3b3, #808080);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#b3b3b3), to(#808080));
            background-image: -webkit-linear-gradient(to bottom, #b3b3b3, #808080);
            background-image: -o-linear-gradient(to bottom, #b3b3b3, #808080);
            background-image: linear-gradient(to bottom, #b3b3b3, #808080);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b3b3b3', endColorstr='#808080', GradientType=0);
            border-color: #808080 #808080 #595959;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            color: #fff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        }
        .datepicker table tr td.selected:hover,
        .datepicker table tr td.selected:hover:hover,
        .datepicker table tr td.selected.disabled:hover,
        .datepicker table tr td.selected.disabled:hover:hover,
        .datepicker table tr td.selected:active,
        .datepicker table tr td.selected:hover:active,
        .datepicker table tr td.selected.disabled:active,
        .datepicker table tr td.selected.disabled:hover:active,
        .datepicker table tr td.selected.active,
        .datepicker table tr td.selected:hover.active,
        .datepicker table tr td.selected.disabled.active,
        .datepicker table tr td.selected.disabled:hover.active,
        .datepicker table tr td.selected.disabled,
        .datepicker table tr td.selected:hover.disabled,
        .datepicker table tr td.selected.disabled.disabled,
        .datepicker table tr td.selected.disabled:hover.disabled,
        .datepicker table tr td.selected[disabled],
        .datepicker table tr td.selected:hover[disabled],
        .datepicker table tr td.selected.disabled[disabled],
        .datepicker table tr td.selected.disabled:hover[disabled] {
            background-color: #808080;
        }
        .datepicker table tr td.selected:active,
        .datepicker table tr td.selected:hover:active,
        .datepicker table tr td.selected.disabled:active,
        .datepicker table tr td.selected.disabled:hover:active,
        .datepicker table tr td.selected.active,
        .datepicker table tr td.selected:hover.active,
        .datepicker table tr td.selected.disabled.active,
        .datepicker table tr td.selected.disabled:hover.active {
            background-color: #666666 \9;
        }
        .datepicker table tr td.active,
        .datepicker table tr td.active:hover,
        .datepicker table tr td.active.disabled,
        .datepicker table tr td.active.disabled:hover {
            background-color: #006dcc;
            background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
            background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: linear-gradient(to bottom, #0088cc, #0044cc);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
            border-color: #0044cc #0044cc #002a80;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            color: #fff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        }
        .datepicker table tr td.active:hover,
        .datepicker table tr td.active:hover:hover,
        .datepicker table tr td.active.disabled:hover,
        .datepicker table tr td.active.disabled:hover:hover,
        .datepicker table tr td.active:active,
        .datepicker table tr td.active:hover:active,
        .datepicker table tr td.active.disabled:active,
        .datepicker table tr td.active.disabled:hover:active,
        .datepicker table tr td.active.active,
        .datepicker table tr td.active:hover.active,
        .datepicker table tr td.active.disabled.active,
        .datepicker table tr td.active.disabled:hover.active,
        .datepicker table tr td.active.disabled,
        .datepicker table tr td.active:hover.disabled,
        .datepicker table tr td.active.disabled.disabled,
        .datepicker table tr td.active.disabled:hover.disabled,
        .datepicker table tr td.active[disabled],
        .datepicker table tr td.active:hover[disabled],
        .datepicker table tr td.active.disabled[disabled],
        .datepicker table tr td.active.disabled:hover[disabled] {
            background-color: #0044cc;
        }
        .datepicker table tr td.active:active,
        .datepicker table tr td.active:hover:active,
        .datepicker table tr td.active.disabled:active,
        .datepicker table tr td.active.disabled:hover:active,
        .datepicker table tr td.active.active,
        .datepicker table tr td.active:hover.active,
        .datepicker table tr td.active.disabled.active,
        .datepicker table tr td.active.disabled:hover.active {
            background-color: #003399 \9;
        }
        .datepicker table tr td span {
            display: block;
            width: 23%;
            height: 54px;
            line-height: 54px;
            float: left;
            margin: 1%;
            cursor: pointer;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }
        .datepicker table tr td span:hover {
            background: #eeeeee;
        }
        .datepicker table tr td span.disabled,
        .datepicker table tr td span.disabled:hover {
            background: none;
            color: #999999;
            cursor: default;
        }
        .datepicker table tr td span.active,
        .datepicker table tr td span.active:hover,
        .datepicker table tr td span.active.disabled,
        .datepicker table tr td span.active.disabled:hover {
            background-color: #006dcc;
            background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
            background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
            background-image: linear-gradient(to bottom, #0088cc, #0044cc);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
            border-color: #0044cc #0044cc #002a80;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            color: #fff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        }
        .datepicker table tr td span.active:hover,
        .datepicker table tr td span.active:hover:hover,
        .datepicker table tr td span.active.disabled:hover,
        .datepicker table tr td span.active.disabled:hover:hover,
        .datepicker table tr td span.active:active,
        .datepicker table tr td span.active:hover:active,
        .datepicker table tr td span.active.disabled:active,
        .datepicker table tr td span.active.disabled:hover:active,
        .datepicker table tr td span.active.active,
        .datepicker table tr td span.active:hover.active,
        .datepicker table tr td span.active.disabled.active,
        .datepicker table tr td span.active.disabled:hover.active,
        .datepicker table tr td span.active.disabled,
        .datepicker table tr td span.active:hover.disabled,
        .datepicker table tr td span.active.disabled.disabled,
        .datepicker table tr td span.active.disabled:hover.disabled,
        .datepicker table tr td span.active[disabled],
        .datepicker table tr td span.active:hover[disabled],
        .datepicker table tr td span.active.disabled[disabled],
        .datepicker table tr td span.active.disabled:hover[disabled] {
            background-color: #0044cc;
        }
        .datepicker table tr td span.active:active,
        .datepicker table tr td span.active:hover:active,
        .datepicker table tr td span.active.disabled:active,
        .datepicker table tr td span.active.disabled:hover:active,
        .datepicker table tr td span.active.active,
        .datepicker table tr td span.active:hover.active,
        .datepicker table tr td span.active.disabled.active,
        .datepicker table tr td span.active.disabled:hover.active {
            background-color: #003399 \9;
        }
        .datepicker table tr td span.old,
        .datepicker table tr td span.new {
            color: #999999;
        }
        .datepicker .datepicker-switch {
            width: 145px;
        }
        .datepicker .datepicker-switch,
        .datepicker .prev,
        .datepicker .next,
        .datepicker tfoot tr th {
            cursor: pointer;
        }
        .datepicker .datepicker-switch:hover,
        .datepicker .prev:hover,
        .datepicker .next:hover,
        .datepicker tfoot tr th:hover {
            background: #eeeeee;
        }
        .datepicker .cw {
            font-size: 10px;
            width: 12px;
            padding: 0 2px 0 5px;
            vertical-align: middle;
        }
        .input-append.date .add-on,
        .input-prepend.date .add-on {
            cursor: pointer;
        }
        .input-append.date .add-on i,
        .input-prepend.date .add-on i {
            margin-top: 3px;
        }
        .input-daterange input {
            text-align: center;
        }
        .input-daterange input:first-child {
            -webkit-border-radius: 3px 0 0 3px;
            -moz-border-radius: 3px 0 0 3px;
            border-radius: 3px 0 0 3px;
        }
        .input-daterange input:last-child {
            -webkit-border-radius: 0 3px 3px 0;
            -moz-border-radius: 0 3px 3px 0;
            border-radius: 0 3px 3px 0;
        }
        .input-daterange .add-on {
            display: inline-block;
            width: auto;
            min-width: 16px;
            height: 18px;
            padding: 4px 5px;
            font-weight: normal;
            line-height: 18px;
            text-align: center;
            text-shadow: 0 1px 0 #ffffff;
            vertical-align: middle;
            background-color: #eeeeee;
            border: 1px solid #ccc;
            margin-left: -5px;
            margin-right: -5px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $('#select_date').on('change', function () {
                console.log($(this).find(":selected").data().day);
                $('#select_time option').addClass('time_none');
                $('#select_time option[data-time="'+$(this).find(":selected").data().day+'"]').removeClass('time_none');
                $('#select_time').val("");
            });
        })
    </script>
@endsection