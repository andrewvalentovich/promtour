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

                            <form action="{{ route('admin.companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <input type="text" value="{{ $company->title }}" name="title" class="form-control" placeholder="Название">
                                    @error('title')
                                        <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="short_description" class="form-control" placeholder="Короткое описание" cols="30" rows="10">{{ $company->short_description }}</textarea>
                                    @error('short_description')
                                        <label class="text-danger font-weight-normal" for="short_description">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Описание" cols="30" rows="10">{{ $company->description }}</textarea>
                                    @error('description')
                                        <label class="text-danger font-weight-normal" for="description">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea name="video" class="form-control" placeholder="Видео" cols="30" rows="10">{{ $company->video }}</textarea>
                                    @error('video')
                                        <label class="text-danger font-weight-normal" for="video">{{ $message }}</label>
                                    @enderror
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
