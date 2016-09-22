<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name', 'shop_image_url', 'item_description', 'shop_id'
    ];
}
