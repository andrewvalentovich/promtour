@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Экускурсии компании {{ $company->name }}</h1>
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
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.companies.excursions.create', $company->id) }}" class="btn btn-primary">Создать экскурсию</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td style="width: 20px">#</td>
                                        <td>Название</td>
                                        <td>Короткое описание</td>
                                        <td style="width:330px;">Действия</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Update software</td>
                                        <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
                                    @foreach($excursions as $excursion)
                                        <tr>
                                            <td>{{ $excursion->id }}</td>
                                            <td>{{ $excursion->name }}</td>
                                            <td>{{ $excursion->description }}</td>
                                            <td class="project-actions">
                                                <a class="btn btn-warning btn-sm" href="{{ route('admin.companies.excursions.index', $excursion->id) }}">
                                                    <i class="fas fa-external-link-square-alt"></i>
                                                    Фотографии
                                                </a>
                                                <a class="btn btn-warning btn-sm" href="#">
                                                    <i class="fas fa-external-link-square-alt"></i>
                                                    Экскурсии
                                                </a>

                                                <a class="btn btn-primary btn-sm" href="{{ route('admin.excursions.show', $excursion->id) }}">
                                                    <i class="fas fa-folder"></i>
                                                    Открыть
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{ route('admin.excursions.edit', $excursion->id) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Редактировать
                                                </a>
                                                <form id="delete_excursion_form-{{ $excursion->id }}" style="display: none;" action="{{ route('admin.excursions.destroy', $excursion->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_excursion_form-{{ $excursion->id }}').submit(); return false;">
                                                    <i class="fas fa-trash"></i>
                                                    Удалить
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>-->
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
