@extends('layouts.index')

@section('content')
{{--    <!-- Content Header (Page header) -->--}}
{{--    <div class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1 class="m-0">Создание компании</h1>--}}
{{--                </div><!-- /.col -->--}}
{{--            </div><!-- /.row -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </div>--}}
{{--    <!-- /.content-header -->--}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card mt-3 card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <h2 class="m-0">Создание компании</h2>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('admin.companies.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Название">
                                    @error('name')
                                        <label class="text-danger font-weight-normal" for="name">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea
                                        name="short_description"
                                        id="admin_company_short_description_create_textarea"
                                        class="form-control"
                                        placeholder="Короткое описание"
                                        cols="30" rows="10"
                                    >{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <label class="text-danger font-weight-normal" for="short_description">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea
                                        name="description"
                                        id="admin_company_description_create_textarea"
                                        class="form-control"
                                        placeholder="Описание"
                                        cols="30" rows="10"
                                    >{{ old('description') }}</textarea>
                                    @error('description')
                                        <label class="text-danger font-weight-normal" for="description">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea
                                        name="video"
                                        id="admin_company_description_create_textarea"
                                        class="form-control"
                                        placeholder="Видео"
                                        cols="30" rows="10"
                                    >{{ old('video') }}</textarea>
                                    @error('video')
                                        <label class="text-danger font-weight-normal" for="video">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Создать">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
