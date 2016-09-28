<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag_name', 'type',
    ];
    
    public static function type_tag() {
        $tags1 = Tag::where('type', 1)->orderBy('created_at', 'asc')->take(10)->get();
        $tags2 = Tag::where('type', 2)->orderBy('created_at', 'asc')->take(10)->get();
        $tags3 = Tag::where('type', 3)->orderBy('created_at', 'asc')->take(10)->get();
        $tags4 = Tag::where('type', 4)->orderBy('created_at', 'asc')->take(10)->get();
        
        $tags = [["type"=> "生鲜肉类", "value"=> $tags1], ["type"=> "海鲜水产", "value"=> $tags2], 
        ["type"=> "熟食调理", "value"=> $tags3], ["type"=> "粮油副食", "value"=> $tags4], ];
        
        return $tags;
    }
    
    public function categories()
    {
        return $this->hasMany('App\Category');
    }
}
