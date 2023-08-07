@extends('layouts.index')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div>
                <!-- /.col -->
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item active">Main</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Добавить</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Имя</td>
                                    <td>Email</td>
                                    <td>Телефон</td>
                                    <td>Роль</td>
                                    <td style="width:162px;">Элемент</td>
                                    <td style="width:330px;">Действия</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->role_name }}</td>
                                        <td class="project-actions">
                                            <a class="btn btn-success btn-sm" href="{{ route('admin.users.bookings.index', $user->id) }}">
                                                <i class="fas fa-external-link-square-alt"></i>
                                                Записи на экскурсии
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.show', $user->id) }}">
                                                <i class="fas fa-folder"></i>
                                                Открыть
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.users.edit', $user->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                                Редактировать
                                            </a>
                                            <form id="delete_user_form-{{ $user->id }}" style="display: none;" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('delete_user_form-{{ $user->id }}').submit(); return false;">
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
