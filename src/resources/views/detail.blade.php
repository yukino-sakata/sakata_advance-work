@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}"/>
@endsection

@section('search')
@endsection
@section('content')

<div class="content">
    <div class="left-content">
        <div class="index">
            <a class="back" href="shoplist"><</a>
            <p class="shop__name">{{$shop->shop__name}}</p>
        </div>
        <img class="image" src="{{$shop->image}}">
        <div class="tag">
            <p class="shop__area">#{{$shop->area}}</p>
            <p class="shop__genre">#{{$shop->genre}}</p>
        </div>
        <div class="comment">
            <p class="shop__comment">{{$shop->comment}}</p>
        </div>
    </div>
    <div class="right-content">
        <form action="reserved" method="POST" class="form">
            <div class="right-content__inner">
            @csrf
            <p class="reserved__header">予約</p>
                <div class="reserved__form">
                    <input class="form__item item__date" type="date" name="date">
                    <select class="form__item item__time" name="time">
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                        <option value="18:00">18:00</option>
                        <option value="18:30">18:30</option>
                        <option value="19:00">19:00</option>
                        <option value="19:30">19:30</option>
                        <option value="20:00">20:00</option>
                        <option value="20:30">20:30</option>
                        <option value="21:00">21:00</option>
                        <option value="21:30">21:30</option>
                        <option value="22:00">22:00</option>
                        <option value="22:30">22:30</option>
                    </select>
                    <select class="form__item item__number" name="number">
                        <option value="1人">1人</option>
                        <option value="2人">2人</option>
                        <option value="3人">3人</option>
                        <option value="4人">4人</option>
                        <option value="5人">5人</option>
                        <option value="6人">6人</option>
                    </select>
                    <input type="hidden" name="shopId" value="{{$shop->id}}">
                    <div class="table-wrap">
                        <table class="form-value">
                           <tr>
                                <th>Shop</th>
                            <td>{{$shop->shop_name}}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                            <td>
                            @if(count($errors)>0)
                            <span class="error">日付を指定してください</span>
                            @endif
                            </td>
                            </tr>
                            <tr>
                                <th>Time</th>
                            <td></td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <button class="reserved__button">予約する</button>
        </form>

    </div>
</div>

@endsection