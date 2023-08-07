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
                    <h1>Просмотр экскурсии</h1>
                </div>
                <div class="col-sm-6">
                    <div class="text-right">
                        <a href="{{ route('admin.excursions.edit', $excursion->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                        <form id="delete_excursion_form-{{ $excursion->id }}" style="display: none;" action="{{ route('admin.excursions.destroy', $excursion->id) }}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_excursion_form-{{ $excursion->id }}').submit(); return false;">
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
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Расписание</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach(json_decode($excursion->schedule, true) as $key => $value)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                {{ $key }}
                                            </td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td>
                                                <div class="p-0">
                                                    <table class="table table-hover">
                                                        <tr>
                                                            @foreach($value as $item)
                                                                <tr>
                                                                    <td>{{ isset($item) ? $item : "Пусто (Выходной)" }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
                        <h3 class="text-primary">{{ $excursion->name }}</h3>
                        <p class="text-muted" style="white-space: pre-line;">
                            {{ $excursion->description }}
                        </p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Общее количество человек в группе
                                <b class="d-block">{{ $excursion->max_participants_count_group }}</b>
                            </p>
                            <p class="text-sm">Количество человек, которое может указать один клиент
                                <b class="d-block">{{ $excursion->max_participants_count_client }}</b>
                            </p>
                            <p class="text-sm">Длительность
                                <b class="d-block">{{ $excursion->duration }}</b>
                            </p>
                            <p class="text-sm">Количество дней для записи
                                <b class="d-block">{{ $excursion->active_days_for_booking }}</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('adminlte/plugins/fullcalendar/main.js') }}"></script>

    <script>
        $(function () {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                })
            }

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()

            console.log("d = "+d);
            console.log("m = "+m);
            console.log("y = "+y);

            var Calendar = FullCalendar.Calendar;

            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: [
                    {
                        title          : 'Long Event',
                        start          : new Date(y, m, d - 5),
                        end            : new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor    : '#f39c12' //yellow
                    },
                    {
                        title          : 'Meeting',
                        start          : new Date(y, m, d, 9, 0),
                        end            : new Date(y, m, d, 10, 30),
                        backgroundColor: '#0073b7', //Blue
                        borderColor    : '#0073b7' //Blue
                    },
                    {
                        title          : 'Lunch',
                        start          : new Date(y, m, d, 12, 0),
                        end            : new Date(y, m, d, 14, 0),
                        allDay         : false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor    : '#00c0ef' //Info (aqua)
                    },
                    {
                        title          : 'Birthday Party',
                        start          : new Date(y, m, d + 1, 19, 0),
                        end            : new Date(y, m, d + 1, 22, 30),
                        allDay         : false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor    : '#00a65a' //Success (green)
                    },
                    {
                        title          : 'Click for Google',
                        start          : new Date(y, m, 28),
                        end            : new Date(y, m, 29),
                        url            : 'https://www.google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor    : '#3c8dbc' //Primary (light-blue)
                    }
                ],
                editable  : false,
                droppable : false, // this allows things to be dropped onto the calendar !!!
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
        })
    </script>
@endsection
