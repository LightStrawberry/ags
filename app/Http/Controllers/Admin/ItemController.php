<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\Tag;
use Input;
use Response;

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
        if (isset($id)) {
            Item::updateOrCreate(['id' => $id], $request->input());
        } else {
            Item::create($request->input());
            return redirect('/admin');
        }
    }
    
    function edit_item_post(Request $request, $id = NULL) {
        var_dump($request->input());
        die();
        if (isset($id)) {
            Item::updateOrCreate(['id' => $id], $request->input());
        } else {
            Item::create($request->input());
            return redirect('/admin');
        }
    }
    
    public function add_item_image()
    {
        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $destinationPath = 'uploads/';
        $filename = "111"."_avatar.jpg";
        $file->move($destinationPath, $filename);
        

        // $user = Auth::user();
        // $user->avatar_path = asset($destinationPath.$filename);
        // $user->save();
        return Response::json(
                    [
                        'success' => true,
                        'avatar' => asset($destinationPath.$filename),
                    ]
                );
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
