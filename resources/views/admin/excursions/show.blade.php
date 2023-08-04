@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр компании</h1>
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
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-3">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" id="id" class="form-control" value="{{ $company->id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" id="title" class="form-control" value="{{ $company->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="short_description">Короткое описание</label>
                                <textarea id="short_description" class="form-control" rows="8" readonly>{{ $company->short_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea id="description" class="form-control" rows="8" readonly>{{ $company->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="video">Видео</label>
                                <textarea id="video" class="form-control" rows="8" readonly>{{ $company->video }}</textarea>
                            </div>
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
