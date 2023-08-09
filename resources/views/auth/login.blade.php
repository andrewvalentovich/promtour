@extends('layouts.app_front')

@section('content')
<main class="main-auth">
    <form class="auth" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="auth__content">
            <div class="auth__top">
                    <span>
                        Нет аккаунта?
                    </span>
                <a href="{{ route('register') }}" class="auth__top-btn btn btn_blue">
                    Регистрация
                </a>
            </div>
            <div class="auth__title">
                Авторизация
            </div>
            <div class="popup__label-list">
                <label class="popup__label-list-item">
                    <span>
                        Логин (почта)
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                </label>
                <label class="popup__label-list-item input-password-w">
                    <span>
                        Пароль
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </span>
                    <img class="eye eye_close" src="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="скрыть пароль">
                    <img class="eye eye_open active" src="{{ Vite::asset('resources/images/icons/eye-close.svg') }}" alt="показать пароль">
                    <input id="password" type="password" name="password" autocomplete="current-password">

                </label>
            </div>
            <button type="submit" class="auth__btn btn btn_green">
                Войти
            </button>
        </div>
    </form>
</main>
@endsection
