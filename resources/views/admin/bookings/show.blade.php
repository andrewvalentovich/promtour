@extends('layouts.index')

@section('styles')
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fullcalendar/main.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Просмотр записи</h1>
                </div>
                <div class="col-sm-6">
                    <div class="text-right">
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                        <form id="delete_booking_form-{{ $booking->id }}" style="display: none;" action="{{ route('admin.bookings.destroy', $booking->id) }}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_booking_form-{{ $booking->id }}').submit(); return false;">
                            Удалить
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
{{--                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-header">--}}
{{--                                <h3 class="card-title">Расписание</h3>--}}
{{--                            </div>--}}
{{--                            <!-- ./card-header -->--}}
{{--                            <div class="card-body p-0">--}}
{{--                                <table class="table table-hover">--}}
{{--                                    <tbody>--}}
{{--                                        @foreach(json_decode($booking->schedule, true) as $key => $value)--}}
{{--                                        <tr data-widget="expandable-table" aria-expanded="false">--}}
{{--                                            <td>--}}
{{--                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>--}}
{{--                                                {{ $key }}--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="expandable-body">--}}
{{--                                            <td>--}}
{{--                                                <div class="p-0">--}}
{{--                                                    <table class="table table-hover">--}}
{{--                                                        <tbody>--}}
{{--                                                            <tr>--}}
{{--                                                                <td>{{ isset($value) ? $value : "Пусто (Выходной)" }}</td>--}}
{{--                                                            </tr>--}}
{{--                                                        </tbody>--}}
{{--                                                    </table>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <!-- /.card-body -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-4 col-md-6 col-lg-4 order-1 order-md-2">
                        <div class="text-muted">
                            <p class="text-sm">ID пользователя
                                <b class="d-block">{{ $booking->user->id }}</b>
                            </p>
                            <p class="text-sm">Имя пользователя
                                <b class="d-block">{{ $booking->user->name }}</b>
                            </p>
                            <p class="text-sm">Email пользователя
                                <b class="d-block">{{ $booking->user->email }}</b>
                            </p>
                            <p class="text-sm">Телефон пользователя
                                <b class="d-block">{{ $booking->user->phone }}</b>
                            </p>
                            <p class="text-sm">Количество человек в группе
                                <b class="d-block">{{ $booking->participants_count }}</b>
                            </p>
                            <p class="text-sm">Дата бронирования
                                <b class="d-block">{{ $booking->booking_date }}</b>
                            </p>
                            <p class="text-sm">Время
                                <b class="d-block">{{ $booking->booking_time }}</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-4 col-md-6 col-lg-4 order-2 order-md-1">
                        <h3 class="text-primary">Экскурсия: {{ $booking->excursion->name }}</h3>
                        <p class="text-muted" style="white-space: pre-line;">
                            {{ $booking->excursion->description }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
@section('scripts')
@endsection
