<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\Tag;

class ItemController extends Controller
{
    function index() {
        $items = Item::all();
        return view('index',compact('items'));
    }
    
    function add_item() {
        $tags = Tag::all();
        return view('admin/add_item',compact('tags'));
    }
    
    function add_item_post(Request $request, $id = NULL) {
        var_dump($request->input());
        if (isset($id)) {
            Item::updateOrCreate(['id' => $id], $request->input());
        } else {
            Item::create($request->input());
            return redirect('/admin');
        }
    }
    
    function del_item() {
        
    }
    
    function add_tag() {
        return view('admin/add_tag');
    }
    
    function add_tag_post(Request $request) {
        var_dump($request->input());
        Tag::create($request->input());
        return redirect('/admin');
    }
}
