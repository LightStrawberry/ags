<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;
use App\Tag;

class ItemController extends Controller
{
    function index() {
        $items = Item::all();
        $tags = Tag::type_tag();
        return view('index',compact('items', 'tags'));
    }
    
    function item_by_tag($tag) {
        $items = Item::where('tag', $tag)->orderBy('updated_at', 'desc')->take(10)->get();
        $tags = Tag::type_tag();
        return view('index',compact('items', 'tags'));
    }
    
    function item_info($id) {
        $item = Item::where('id', $id)->get()->first();
        return view('item',compact('item'));
    }
}
