<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'phone', 'password',
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
        // $favs = Favorite::where('user_id', 1)->get();
        // $shop = Shop::
        // var_dump(Favorite::where('user_id', 1)->get());
        // die();
        return Favorite::where('user_id', 1)->get();
        
    }
}
