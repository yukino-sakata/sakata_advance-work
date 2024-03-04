@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/register-thanks.css')}}"/>
@endsection
@section('menu')
<a href="menu2" class="icon">
    <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn">
            <span></span>
         </label>
</a>
@endsection
@section('content')

<div class="content">
    <p class="thanks__message">会員登録ありがとうございます</p>
    <a class="back" href="shoplist">戻る</a>
</div>

@endsection