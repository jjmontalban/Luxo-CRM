<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use SoftDeletes;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }

    protected $with = ['country:id,name', 'province:id,name'];

}
