@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}"/>
@endsection

@section('content')
    <div class="form__error">
        <ul class="error">
            <li>@error('name')
                    {{ $message }}
                @enderror</li>
            <li>@error('email')
                    {{ $message }}
                @enderror</li>
            <li>@error('password')
                    {{ $message }}
                @enderror</li>
        </ul>
    </div>
    <div class="content__register">
        <p class="register__header">Registration</p>
        <form class="register__form" action="/register" method="post">
        @csrf
            <div class="register-item">
                <input class="register-item__name" type="text" name="name" placeholder="Username" value="{{ old('name') }}">
            </div>
            <div class="register-item">
                <input class="register-item__email" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="register-item">
                <input class="register-item__pass" type="password" name="password" placeholder="Password">
            </div>
            <div class="register-button">
                <button class="button" type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection
