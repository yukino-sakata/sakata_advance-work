@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/shoplist.css')}}"/>
@endsection

@section('search')
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
                    <form action="detail" method="POST">
                        @csrf
                        <input type="hidden" name="shopId" value="{{$shop->id}}"/>
                        <button class="shop__detail" href="detail">詳しくみる</button>
                    </form>
                    <a class="shop__bookmark">&hearts;</a>
                </div>
            </div>
        </div>
        @endforeach

@endsection