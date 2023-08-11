@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать категорию</h1>
                </div><!-- /.col -->
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item active">Main</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

            </div>
            <div class="col-lg-6 col-md-12">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control" placeholder="Имя">
                            @error('name')
                            <label class="text-danger font-weight-normal" for="name">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="type" class="custom-select form-control" id="type">
                                <option disabled selected>Тип</option>
                                @foreach($category->types as $key => $value)
                                    <option {{ ($category->type == $key) ? ' selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                {{--                                    <option {{ $category->type == 0 || old('type') == 0 ? ' selected' : '' }} value="0">Male</option>--}}
                                {{--                                    <option {{ $category->type == 1 || old('type') == 1 ? ' selected' : '' }} value="1">Female</option>--}}
                            </select>
                            @error('type')
                            <label class="text-danger font-weight-normal" for="type">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Сохранить изменения">
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
