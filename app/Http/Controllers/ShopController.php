<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests;
use App\Shop;
use App\Tag;
use Response;
use Route;

class ShopController extends Controller
{
    function index() {
        return view('/select_pos');
    }
    
    function setpos() {
        return view('/select_pos');
        // $pos = session('pos', null);
        // if($pos == null) {
        //     return view('/select_pos');
        // } else {
        //     $firstTag = Tag::all()->first()->id;
        //     return redirect('/tag/'.$firstTag.'/');
        // }
    }
    
    function category() {
        $firstTag = Tag::all()->first()->id;
        return redirect('/tag/'.$firstTag.'/');
    }
    
    function select_pos($id) {
        //$request->session()->put('pos', $id);
        session(['pos' => $id]);
        $firstTag = Tag::all()->first()->id;
        return redirect('/tag/'.$firstTag.'/');
        //return redirect('/');
    }
    
    function shop_by_tag($tag, $category=0) {
        $pos = session('pos', null);
        if(Auth::user()) {
            $user = Auth::user();
        } else {
            $user = null;
        }
        if($category === 0) {
            $shops = Shop::where('shop_pos', $pos)->where('tag', $tag)->orderBy('updated_at', 'desc')->get();
        } else {
            $shops = Shop::where('shop_pos', $pos)->where('tag', $tag)->where('category', $category)->orderBy('updated_at', 'desc')->get();
        }
        $tags = Tag::type_tag();
        $current_tag = Tag::find($tag);
        // var_dump($current_tag->categories()->all());die();
        return view('index',compact('shops', 'tags', 'current_tag', 'user'));
    }
    
    function shop_info($id) {
        $shop = Shop::where('id', $id)->get()->first();
        return view('shop',compact('shop'));
    }
}
