<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function userdata()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function categorydata()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
