@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}"/>
@endsection
@section('menu')
<a href="menu1" class="icon">
    <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn">
            <span></span>
         </label>
</a>
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
<div class="content__login">
    <p class="login__header">Login</p>
        <form class="login__form" action="/login" method="post">
        @csrf
            <div class="login-item">
                <input class="login-item__email" type="email" name="email" placeholder="Email" value="{{ old('email') }}"/>
            </div>
            <div class="login-item">
                <input class="login-item__pass" type="password" name="password" placeholder="Password"/>
            </div>
            <div class="login-button">
                <button class="button" type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection
