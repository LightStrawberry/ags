<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;

class ItemController extends Controller
{
    function item_info($id) {
        $item = Item::where('id', $id)->get()->first();
        return view('item',compact('item'));
    }
}
