<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'shop_name', 'type', 'tag', 'shop_image_url', 'shop_description', 'shop_address', 'shop_phone', 'shop_wechat', 'created_at', 'updated_at'
    ];
}
