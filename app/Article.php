<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'excerpt','body'];
    //OR
    //protected $guarded = [];

//    public function getRouteKeyName(){
//        return 'title';
//    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
