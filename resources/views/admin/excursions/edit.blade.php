@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование экскурсии</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <!-- .card-body -->
                        <div class="card-body table-responsive p-3">

                            <form action="{{ route('admin.excursions.update', $excursion->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <input type="text" value="{{ old('name') ?? $excursion->name }}" name="name" class="form-control" placeholder="Название">
                                    @error('name')
                                    <label class="text-danger font-weight-normal" for="name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea
                                        name="description"
                                        id="admin_company_description_create_textarea"
                                        class="form-control"
                                        placeholder="Описание"
                                        cols="30" rows="10"
                                    >{{ old('description') ?? $excursion->description }}</textarea>
                                    @error('description')
                                    <label class="text-danger font-weight-normal" for="description">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ old('price') ?? $excursion->price }}" name="price" class="form-control" placeholder="Стоимость билета (rub)">
                                    @error('price')
                                    <label class="text-danger font-weight-normal" for="price">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ old('max_participants_count_group') ?? $excursion->max_participants_count_group }}" name="max_participants_count_group" class="form-control" placeholder="Максимальное количество человек в экскурсионной группе">
                                    @error('max_participants_count_group')
                                    <label class="text-danger font-weight-normal" for="max_participants_count_group">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" value="{{ old('max_participants_count_client') ?? $excursion->max_participants_count_client }}" name="max_participants_count_client" class="form-control" placeholder="Максимальное количество человек, которое может указать клиент">
                                    @error('max_participants_count_client')
                                    <label class="text-danger font-weight-normal" for="max_participants_count_client">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group date">
                                        <input type="text" id="excursions_create_duration" name="duration" value="{{ old('duration') ?? $excursion->duration }}" class="form-control" placeholder="Продолжительсть экскурсии в минутах"/>
                                    </div>
                                    @error('duration')
                                    <label class="text-danger font-weight-normal" for="duration">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group date">
                                        <input type="text" id="excursions_create_days_off" name="days_off" value="{{ old('days_off') ?? $excursion->days_off }}" class="form-control" placeholder="Выходные дни" autocomplete="off"/>
                                        <div class="input-group-addon input-group-append">
                                            <div class="input-group-text">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                    @error('days_off')
                                    <label class="text-danger font-weight-normal" for="days_off">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div id="accordion">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                    Расписание
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <i class="d-block">Введите время начала экскурсий через запятую, например: 10:00, 12:00, 14:00</i>
                                                <i class="d-block">При этом, если поле оставить пустым, записей в этот день не будет</i>
                                                @foreach(json_decode($excursion->schedule, true) as $key => $value)
                                                <div class="form-group mt-3">
                                                    <label class="font-weight-normal" for="{{ $key }}">{{ $key }}</label>
                                                    <input type="text" id="{{ $key }}" value="{{ implode(", ", $value) }}" name="schedule[{{ $key }}]" class="form-control" placeholder="Пусто (Выходной)">
                                                    @error('{{ $key }}')
                                                    <label class="text-danger font-weight-normal" for="{{ $key }}">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Обновить">
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
