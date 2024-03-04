@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/shoplist.css')}}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@endsection

@section('menu')
<a href="menu2" class="icon">
    <input type="checkbox" id="menu-btn-check">
        <label for="menu-btn-check" class="menu-btn">
            <span></span>
         </label>
</a>
@endsection
@section('search')
<div class="nav">
    <form class="search__area" action="search" method="GET">
    @csrf
        <div class="search-form__item">
        <select class="search-form__item-select" name="area">
            <option value="">All Area</option>
            <option value="東京都">東京都</option>
            <option value="大阪府">大阪府</option>
            <option value="福岡県">福岡県</option>
        </select>
        <select class="search-form__item-select" name="genre">
            <option value="">All Genre</option>
            <option value="寿司">寿司</option>
            <option value="焼肉">焼肉</option>                <option value="居酒屋">居酒屋</option>
            <option value="イタリアン">イタリアン</option>
            <option value="ラーメン">ラーメン</option>
        </select>
        <span><i class="bi bi-search"></i>
        </span>
        <input class="search-form__item-input" type="text" name="keyword" value="{{old('area')}}" placeholder="Search...">
        </div>
    </form>
</div>
@endsection
@section('content')
    <div class="shop-cards">
    @foreach ($shops as $shop)
        <div class="card">
            <img class="card__image" src="{{$shop->image}}" alt="image">
            <div class="card-info">
                <p class="shop__name">{{$shop->shop_name}}</p>
                <p class="shop__area">#{{$shop->area}}</p>
                <p class="shop__genre">#{{$shop->genre}}</p>
                <div class="detail">
                    <form class="form" action="detail" method="GET" >
                    @csrf
                        <input type="hidden" name="shopId" value="{{$shop->shop_id}}"/>
                        <button class="shop__detail" href="detail">詳しくみる</button>
                    </form>
                    @if(($shop->shop_id == $shop->id) && ($shop->user_id == $userId))
                    <form class="form" action="unlike" method="POST">
                    @csrf
                        <input type="hidden" name="shopId" value="{{$shop->id}}"/>
                        <button class="shop__bookmark red" method="POST">
                            <i class="bi bi-heart-fill"></i></button>
                    </form>
                    @else
                    <form class="form" action="like" method="POST">
                    @csrf
                        <input type="hidden" name="shopId" value="{{$shop->id}}"/>
                        <button class="shop__bookmark gray" method="POST">
                            <i class="bi bi-heart-fill"></i></button>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection