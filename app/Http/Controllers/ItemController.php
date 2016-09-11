<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    function index() {
        $items = Item::all();      
        return view('item.index',compact('items')); 
    }
}
