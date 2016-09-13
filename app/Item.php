<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name', 'type', 'tag', 'item_image_url', 'item_description', 'item_address', 'shop_name', 'created_at', 'updated_at'
    ];
}
