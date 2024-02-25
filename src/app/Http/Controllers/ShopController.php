<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reserved;
use App\Models\Bookmark;
use App\Http\Requests\ReservedRequest;
use Auth;


class ShopController extends Controller
{
    public function shoplist(){
        $user = Auth::user();
        $shops = Bookmark::rightJoin('shops', 'bookmarks.shop_id', '=', 'shops.id')->get();
        return view('shoplist',['shops'=>$shops]);
    }

    public function detail(Request $request){
        $shopId = $request->shopId;
        $shop = Shop::find($shopId);
        return view('detail',['shop'=>$shop]);
    }

    public function reserved(ReservedRequest $request){
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

        $bookmarks = Bookmark::join('shops', 'bookmarks.shop_id', '=', 'shops.id')->where('user_id',$user->id)->get();

        return view('mypage',['reservations'=>$reservations, 'bookmarks'=>$bookmarks])->with('user',$user);
    }

    public function delete(Request $request){
        $user = Auth::user();
        $reservation = Reserved::where('id',$request->reservation__id)->delete();

        return redirect('mypage');
    }
    
    public function like(Request $request){
        $user = Auth::user();

        $form = [
            'user_id' => $user->id,
            'shop_id' => $request->shopId
        ];
        Bookmark::create($form);
        return back();
    }

    public function unlike(Request $request){
        $user = Auth::user()->id;

        $like = Bookmark::where('shop_id',$request->shopId)->where('user_id',$user)->delete();
        return back();
    }
}
