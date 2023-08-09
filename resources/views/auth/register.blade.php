@extends('layouts.app_front')

@section('content')
    <main class="main-auth">
        <form class="auth" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth__content">
                <div class="auth__top">
						<span>
							Уже есть аккаунт?
						</span>
                    <a href="{{ route('login') }}" class="auth__top-btn btn btn_blue">
                        Войти
                    </a>
                </div>
                <div class="auth__title">
                    Регистрация
                </div>
                <div class="popup__label-list">
                    <label class="popup__label-list-item">
                        <span>
                            Имя
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </span>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    </label>

                    <label class="popup__label-list-item">
							<span>
								Логин (почта)
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
							</span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email">
                    </label>

                    <label class="popup__label-list-item">
							<span>
								Номер телефона
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
							</span>
                            <input id="phone" type="phone" name="phone" value="{{ old('phone') }}" autocomplete="phone">
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
                        <input id="password" type="password" name="password" autocomplete="new-password">
                    </label>

                    <label class="popup__label-list-item input-password-w">
                        <span>
                            Повторите пароль
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </span>
                        <img class="eye eye_close" src="{{ Vite::asset('resources/images/icons/eye.svg') }}" alt="скрыть пароль">
                        <img class="eye eye_open active" src="{{ Vite::asset('resources/images/icons/eye-close.svg') }}" alt="показать пароль">
                        <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
                    </label>
                </div>
                <button type="submit" class="auth__btn btn btn_green">
                    Создать аккаунт
                </button>
            </div>
        </form>
    </main>
@endsection
