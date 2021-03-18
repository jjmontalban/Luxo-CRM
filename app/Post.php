<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function userdata()
    {
        return $this->hasMany(User::class,'id','id');
    }
    public function categorydata()
    {
        return $this->belongsTo(Category::class,'id','id');
    }

}
