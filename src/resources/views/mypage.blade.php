@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@endsection

@section('content')

<div class="content">
    <div class="left-content">
        <p class="index__name">予約状況</p>
        @foreach($reservations as $key=>$reservation)
        <div class="reserved-card">
            <div class="table-wrap">
                <div class="card__header">
                    <i class="bi bi-clock-fill"></i>
                    <p class="reserved-no">予約{{$key+1}}</p>
                    <form action="delete" method="POST">
                    @csrf
                        <input type="hidden" name="reservation__id" value="{{$reservation->id}}"/>
                        <button class="delete"><i class="bi bi-x-circle"></i></button>
                    </form>
                </div>
                <table class="form-value">
                    <tr>
                        <th>Shop</th>
                        <td>{{$reservation->shop_name}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{$reservation->date}}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>{{$reservation->time}}</td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td>{{$reservation->number}}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
    </div>
    <div class="right-content">
        <p class="user-name">{{$user->name}}さん</p>
        <p class="index">お気に入り店舗</p>
            <div class="shop-cards">
    @foreach ($bookmarks as $bookmark)
            <div class="card">
                <img class="card__image" src="{{$bookmark->image}}" alt="image">
                <div class="card-info">
                    <p class="shop__name">{{$bookmark->shop_name}}</p>
                    <p class="shop__area">#{{$bookmark->area}}</p>
                    <p class="shop__genre">#{{$bookmark->genre}}</p>
                    <div class="detail">
                        <form class="form" action="detail" method="POST">
                        @csrf
                            <input type="hidden" name="shopId" value="{{$bookmark->id}}"/>
                            <button class="shop__detail" href="detail">詳しくみる</button>
                        </form>
                        <form class="form" action="unlike" method="POST">
                        @csrf
                            <input type="hidden" name="shopId" value="{{$bookmark->id}}"/>
                            <button class="shop__bookmark" method="POST">
                                <i class="bi bi-heart-fill"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection