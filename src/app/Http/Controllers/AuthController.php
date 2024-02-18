<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class AuthController extends Controller
{
    public function index(){
        $shops = Shop::all();
        return view('shoplist',['shops'=>$shops]);
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function menu1(){
        return view('menu1');
    }

    public function menu2(){
        return view('menu2');
    }

    public function mypage(){
        return view('mypage');
    }


}
