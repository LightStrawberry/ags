<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Qiniu\Auth as QiniuAuth;
use Qiniu\Storage\UploadManager;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Shop;
use App\Tag;
use Input;
use Response;

class ShopController extends Controller
{
    function index() {
        $user = Auth::user();
        if($user) {
            $shops = Shop::orderBy('updated_at', 'desc')->get();
            return view('admin/index',compact('shops'));
        } else {
            return redirect('/');
        }
    }
    
    function add_shop() {
        $tags = Tag::all();
        return view('admin/add_shop',compact('tags'));
    }
    
    function add_shop_post(Request $request, $id = NULL) {
        if (isset($id)) {
            Shop::updateOrCreate(['id' => $id], $request->input());
        } else {
            $shop = Shop::create($request->input());
            self::imgUpload($shop->id);
            return redirect('/admin');
        }
    }
    
    public function imgUpload($id) {
        $url = "http://odi9y7rkk.bkt.clouddn.com/";
        $callback = self::qiniu_upload($_FILES['file']['tmp_name']);
        $shop = Shop::find($id);

        if($shop->shop_image_url == null) {
            $shop->shop_image_url = json_encode([$url.$callback]);
        } else {
            $urls = json_decode($shop->shop_image_url);
            $urls[] = $url.$callback;
            $shop->shop_image_url = json_encode($urls);
        }

        $shop->save();
    }
    
    function edit_shop($id) {
        $shop = Shop::find($id);
        $tags = Tag::all();
        return view('admin/add_shop',compact('shop', 'tags'));
    }
    
    function edit_shop_post(Request $request, $id = NULL) {
        if (isset($id)) {
            Shop::updateOrCreate(['id' => $id], $request->input());
            return redirect('/admin');
        } else {
            $shop = Shop::create($request->input());
            if(isset($_FILES['file']['tmp_name'])) {
                self::imgUpload($shop->id);
            }
            return redirect('/admin');
        }
    }
    
    public function add_shop_image($id)
    {
        return view('admin/add_img',compact('id'));
    }
    
    public function add_shop_image_post($id)
    {
        self::imgUpload($id);
        return redirect('/admin');
    }
    
    function del_shop($id) {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect('/admin');
    }
    
    function tag() {
        $tags = Tag::type_tag();
        return view('admin/tag', compact('tags'));
    }
    
    function add_tag() {
        return view('admin/add_tag');
    }
    
    function add_tag_post(Request $request) {
        Tag::create($request->input());
        return redirect('/admin/tag');
    }
    
    function del_tag($id) {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/admin/tag');
    }
    
    function qiniu_upload($img_path) {
        $accessKey = 'PQ40GWVaMPa9BNN2C92JtMyOUrjP1MMU53GJxzBD';
        $secretKey = 'Jh5xNrgdynLsGsrTDP-3D6IZj1oam1PX2xn5bEHR';
        $bucket = 'h-ags';
        $auth = new QiniuAuth($accessKey, $secretKey);
        $uptoken = $auth->uploadToken($bucket);
        $img_key = md5(time());
        $filePath = $img_path;
        $uploadMgr = new UploadManager();
        $uploadMgr->putFile($uptoken, $img_key, $filePath);
            
        return $img_key;
    }
}
