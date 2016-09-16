<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Shop;
use App\Tag;

class ShopController extends Controller
{
    function index() {
        $shops = Shop::all();
        $tags = Tag::type_tag();
        return view('index',compact('shops', 'tags'));
    }
    
    function shop_by_tag($tag) {
        $shops = Shop::where('tag', $tag)->orderBy('updated_at', 'desc')->take(10)->get();
        $tags = Tag::type_tag();
        return view('index',compact('shops', 'tags'));
    }
    
    function shop_info($id) {
        $shop = Shop::where('id', $id)->get()->first();
        return view('shop',compact('shop'));
    }
}
