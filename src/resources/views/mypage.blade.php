@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
@endsection

@section('content')

<div class="content">
    <div class="left-content">
        <p class="index">予約状況</p>
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
</div>
@endsection