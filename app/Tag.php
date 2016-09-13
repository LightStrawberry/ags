<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'type',
    ];
    
    public static function type_tag() {
        $tags1 = Tag::where('type', 1)->orderBy('created_at', 'desc')->take(10)->get();
        $tags2 = Tag::where('type', 2)->orderBy('created_at', 'desc')->take(10)->get();
        $tags3 = Tag::where('type', 3)->orderBy('created_at', 'desc')->take(10)->get();
        $tags4 = Tag::where('type', 4)->orderBy('created_at', 'desc')->take(10)->get();
        
        $tags = [["type"=> "肉类", "value"=> $tags1], ["type"=> "冻品", "value"=> $tags2], 
        ["type"=> "蔬菜", "value"=> $tags3], ["type"=> "水产", "value"=> $tags4], ];
        
        return $tags;
    }
}
