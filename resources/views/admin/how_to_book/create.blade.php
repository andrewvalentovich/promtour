@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить контент страницы "Как записаться"</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Все</li>
                    </ol>
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
                <form action="{{ route('admin.how_to_book.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Заголовок">
                    </div>
                    @error('title')
                        <label class="text-danger font-weight-normal" for="title">{{ $message }}</label>
                    @enderror

                    <div class="form-group">
                        <textarea id="content_summernote" name="content" placeholder="Контент">

                        </textarea>
                    </div>
                    @error('content')
                        <label class="text-danger font-weight-normal" for="content">{{ $message }}</label>
                    @enderror

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </div>
                </form>
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
