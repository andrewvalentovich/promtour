@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование фотографии</h1>
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

                            <form action="{{ route('admin.photos.update', $photo->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    @if(isset($photo->image))
                                        <img style="max-width: 100%" class="mb-3" src="{{ asset($photo->image_url) }}" alt="Картинка новости">
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input" id="photo">
                                            <label class="custom-file-label" for="photo">Выберите картинку для замены</label>
                                        </div>
                                    </div>
                                    @error('photo')
                                        <label class="text-danger font-weight-normal" for="photo">{{ $message }}</label>
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
@section('scripts')
    <script>

    </script>
@endsection
