<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Shop;
use App\Tag;
use Response;
use Route;

class ShopController extends Controller
{
    function index() {
        return redirect('/tag/5/');
    }
    
    function shop_by_tag($tag, $category=0) {
        if($category === 0) {
            $shops = Shop::where('tag', $tag)->orderBy('updated_at', 'desc')->get();
        } else {
            $shops = Shop::where('tag', $tag)->where('category', $category)->orderBy('updated_at', 'desc')->get();
        }
        $tags = Tag::type_tag();    
        $current_tag = Tag::find($tag);
        // var_dump($current_tag->categories()->all());die();
        return view('index',compact('shops', 'tags', 'current_tag'));
    }
    
    function shop_info($id) {
        $shop = Shop::where('id', $id)->get()->first();
        return view('shop',compact('shop'));
    }
}
