<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Shop extends Model
{
    protected $fillable = [
        'shop_name', 'type', 'category', 'tag', 'shop_pos', 'shop_image_url', 'shop_description', 'shop_address', 'shop_phone', 'shop_wechat', 'created_at', 'updated_at', 'liked'
    ];
    
    public function items() {
        return $this->hasMany('App\Item');
    }
    
    public function liked() {
        
    }
}
