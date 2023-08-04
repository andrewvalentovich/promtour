@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Компании</h1>
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
                            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">Создать компанию</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <td style="width:48px;text-align:center;">#</td>
                                        <td>Название</td>
                                        <td>Короткое описание</td>
                                        <td style="width:237px;">Элементы</td>
                                        <td style="width:330px;">Действия</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td style="text-align:center;">{{ $company->id }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->short_description }}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-warning btn-sm" href="{{ route('admin.companies.photos.index', $company->id) }}">
                                                <i class="fas fa-external-link-square-alt"></i>
                                                Фотографии
                                            </a>
                                            <a class="btn btn-success btn-sm" href="{{ route('admin.companies.excursions.index', $company->id) }}">
                                                <i class="fas fa-external-link-square-alt"></i>
                                                Экскурсии
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.companies.show', $company->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.companies.edit', $company->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form id="delete_company_form-{{ $company->id }}" style="display: none;" action="{{ route('admin.companies.destroy', $company->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_company_form-{{ $company->id }}').submit(); return false;">
                                                <i class="fas fa-trash"></i>
                                                Удалить
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
