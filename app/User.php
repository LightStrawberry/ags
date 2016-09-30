<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function findByUsernameOrFail($name, $columns = array('*')) 
    {
        if ( ! is_null($user = static::wherename($name)->first($columns))) {
            return $user;
        }
        //throw new ModelNotFoundException;
    }
    
    public static function likeShops() {
        $user = Auth::user();
        // $favs = Favorite::where('user_id', 1)->get();
        // $shop = Shop::
        // var_dump(Favorite::where('user_id', 1)->get());
        // die();
        return Favorite::where('user_id', $user->id)->get();
    }
    
    public static function liked($id) {
        if(Auth::user()) {
            $user_id = Auth::user()->id;
        } else {
            $user_id = 0;
        }
        $a = Favorite::where('user_id', $user_id)->where('shop_id', $id)->get();
        if($a->count() != 0) {
            return true;
        } else {
            return false;
        }
    }
}
