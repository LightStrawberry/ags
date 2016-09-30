<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\User;
use App\Favorite;
use App\Shop;

class UserController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }
    
    function user_center() {
        $user = Auth::user();
        return view('user_center',compact('user'));
    }
    
    function generate_random_code() {
        $digits = 4;
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
    }
    
    // function favorite($id) {
    //     $user = Auth::user();
    //     if($user) {
    //         $data = ['shop_id'=>$id, 'user_id'=>$user->id, 'favorite'=>1];
    //         Favorite::create($data);
    //         return redirect('/');
    //     } else {
    //         echo "111";
    //     }
    // }
    // 
    // function unfavorite($id) {
    //     $user = Auth::user();
    //     if($user) {
    //         $data = ['shop_id'=>$id, 'user_id'=>$user->id, 'favorite'=>0];
    //         Favorite::updateOrCreate($data);
    //         return redirect('/');
    //     } else {
    //         echo "111";
    //     }
    // }
    function sendphone($phone) {
        $vcode = self::generate_random_code();
        if(Redis::get($phone)) {
            return "已经发送";
        } else {
            Redis::set($phone, $vcode);
            Redis::command('expire', [$phone, 60]);
            return self::send($phone, $vcode);
        }
    }
    
    function myFavs () {
        $user = Auth::user();
        $favShops = self::likes($user);
        return view('fav',compact('favShops'));
    }
    
    public function likes($user)
    {
        $shop_id = $user->likeShops();
        $shops = [];
        foreach ($shop_id as $i) {
            $shops[] = Shop::find($i->shop_id);
        }
        return $shops;
    }
    
    public function likeCreateOrDelete($id)
    {
        //$user = Auth::user();
        if(Auth::check()) {
            $shop = Shop::find($id);
            $data = ['shop_id'=> $shop->id, 'user_id'=> Auth::user()->id ];
            $fav = Favorite::isUserLikedShop(Auth::user(), $shop);
            if (Favorite::isUserLikedShop(Auth::user(), $shop)) {
                $fav->delete();
                //Auth::user()->likeShops()->detach($shop->id);
            } else {
                Favorite::create($data);
                //Auth::user()->likeShops()->attach($shop->id);
                //Notification::notify('topic_like', Auth::user(), $topic->user, $topic);
            }
            //Flash::success(lang('Operation succeeded.'));
            // return json_encode(['success', 200]);
        } else {
            return redirect('/login');
        }
    }
    
    function send($phone, $code) {
        $url = 'http://sendcloud.sohu.com/smsapi/send';

        $param = array(
            'smsUser' => 'jianku', 
            'templateId' => '2653',
            'msgType' => '0',
            'phone' => $phone,
            'vars' => '{"%code%":'.$code.'}'
        );

        $sParamStr = "";
        ksort($param);
        foreach ($param as $sKey => $sValue) {
            $sParamStr .= $sKey . '=' . $sValue . '&';
        }

        $sParamStr = trim($sParamStr, '&');
        $smskey = 'tMpkYWps5VXgNCQpDh7uku1sMEGuCDj0';
        $sSignature = md5($smskey."&".$sParamStr."&".$smskey);

        
        $param = array(
            'smsUser' => 'jianku', 
            'templateId' => '2653',
            'msgType' => '0',
            'phone' => $phone,
            'vars' => '{"%code%":'.$code.'}',
            'signature' => $sSignature
        );

        $data = http_build_query($param);

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-Type:application/x-www-form-urlencoded',
                'content' => $data

        ));
        $context  = stream_context_create($options);
        $result = file_get_contents($url, FILE_TEXT, $context);

        return $result;
    }
}
