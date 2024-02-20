<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserved;
use App\Http\Requests\ReservedRequest;
use Auth;


class ShopController extends Controller
{
    public function shoplist(){
        $shops = Shop::all();
        return view('shoplist',['shops'=>$shops]);
    }

    public function detail(Request $request){
        $shopId = $request->shopId;
        $shop = Shop::find($shopId);
        return view('detail',['shop'=>$shop]);
    }

    public function reserved(Request $request){
        $user = Auth::user();
        $form = [
            'user_id' => $user->id,
            'shop_id' => $request->shopId,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number
            ];
        Reserved::create($form);
        return view('thanks');
    }

    public function mypage(Request $request){
        $user = Auth::user();

        $reservations = Shop::join('reserveds','shops.id', '=', 'reserveds.shop_id')->where('user_id',$user->id)->get();

        return view('mypage',['reservations'=>$reservations]);
    }

    public function delete(Request $request){
        $user = Auth::user();
        $reservation = Reserved::where('id',$request->reservation__id)->delete();

        return redirect('mypage');
    }
}
