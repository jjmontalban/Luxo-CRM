<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use SoftDeletes;

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }


    public function scopeFilterByProvince($query, $province_id)
    {
        return $query->when($province_id,function($query) use ($province_id){
            $query->whereHas('addresses', function($query) use($province_id)
                {
                $query->where('province_id', $province_id);
                }); 
        });
    }
    

}
