<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'shop_id', 'user_id',
    ];
    
    public $timestamps = false;
    
    public function shop() {
        return $this->belongsTo('App\Shop');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public static function isUserLikedShop(User $user, Shop $shop) {
        return Favorite::where('user_id', $user->id)
                        ->where('shop_id', $shop->id)
                        ->first();
    }
}
