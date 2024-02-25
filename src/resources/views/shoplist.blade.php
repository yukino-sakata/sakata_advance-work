@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/shoplist.css')}}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
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
                    <form class="form" action="detail" method="GET" >
                    @csrf
                        <input type="hidden" name="shopId" value="{{$shop->id}}"/>
                        <button class="shop__detail" href="detail">詳しくみる</button>
                    </form>
                    @if($shop->shop_id > 0)
                    <form class="form" action="unlike" method="POST">
                    @csrf
                        <input type="hidden" name="shopId" value="{{$shop->id}}"/>
                        <button class="shop__bookmark red" method="POST">
                            <i class="bi bi-heart-fill"></i></button>
                    </form>
                    @elseif($shop->shop_id == 0)
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