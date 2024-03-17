@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}"/>
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
    <div class="left-content">
        <div class="index">
            <a class="back" href="shoplist"><</a>
            <p class="shop__name">{{$shop->shop_name}}</p>
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
                    <input class="form__item item__date" type="date" name="date" value="{{old('date')}}" id="date" onchange="onDateChange()">
                    <select class="form__item item__time" name="time" id="time" onchange="onTimeChange()">
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
                    <select class="form__item item__number" name="number" id="number" onchange="onNumberChange()">
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
                                    <p id="js-date"></p>
                                    @if(count($errors)>0)
                                    <span class="error" id="error">{{$errors->first('date')}}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td>
                                    <p id="js-time">17:00</p>
                                </td>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <td>
                                    <p id="js-number">1人</p>
                                </td>
                            </tr>
                        </table>
                                <script>
                                function onDateChange(event){
                                var date = document.getElementById('date');
                                    console.log(date.value);

                                var p1 = document.getElementById('js-date');
                                    p1.innerHTML = date.value;
                                var er = document.getElementById('error');
                                    er.innerHTML = '';
                                }
                                function onTimeChange(event){
                                var time = document.getElementById('time');
                                    console.log(time.value);

                                var p2 = document.getElementById('js-time');
                                    p2.innerHTML = time.value;
                                }
                                function onNumberChange(event){
                                var number = document.getElementById('number');
                                    console.log(number.value);

                                var p3 = document.getElementById('js-number');
                                    p3.innerHTML = number.value;
                                }

                                </script>
                    </div>
                </div>
            </div>
            <button class="reserved__button">予約する</button>
        </form>

    </div>
</div>

@endsection