@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать контент страницы "Как записатсья"</h1>
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
                    <form action="{{ route('admin.how_to_book.update', $how_to_book->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <input type="text" value="{{ old('title') ?? $how_to_book->title }}" name="title" class="form-control" placeholder="Заголовок">
                        </div>
                        @error('title')
                            <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <textarea id="content_summernote" name="content" placeholder="Контент">{{ $how_to_book->content }}</textarea>
                        </div>
                        @error('content')
                            <label class="text-danger font-weight-normal" for="content">{{ $message }}</label>
                        @enderror

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

@section('scripts')
    <script>
        $(function () {
            // Summernote
            $('#content_summernote').summernote({
                height: 350,   //set editable area's height
            })
        })
    </script>
@endsection
