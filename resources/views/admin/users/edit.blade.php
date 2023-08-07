@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
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
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Имя">
                            @error('name')
                            <label class="text-danger font-weight-normal" for="name">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ $user->email }}" name="email" class="form-control" placeholder="Email">
                            @error('email')
                            <label class="text-danger font-weight-normal" for="email">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" placeholder="Номер телефона">
                            @error('phone')
                            <label class="text-danger font-weight-normal" for="phone">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="role" class="custom-select form-control" id="role">
                                <option disabled selected>Роль</option>
                                @foreach($user->roles as $key => $value)
                                    <option {{ ($user->role == $key) ? ' selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                {{--                                    <option {{ $user->role == 0 || old('role') == 0 ? ' selected' : '' }} value="0">Male</option>--}}
                                {{--                                    <option {{ $user->role == 1 || old('role') == 1 ? ' selected' : '' }} value="1">Female</option>--}}
                            </select>
                            @error('role')
                            <label class="text-danger font-weight-normal" for="role">{{ $message }}</label>
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
