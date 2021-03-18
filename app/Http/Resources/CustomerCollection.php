<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    /* public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($customer){
                return [
                    'id' => $customer->id,
                    'firstname' => $customer->firstname,
                    'lastname' => $customer->lastname,
                    'company' => $customer->company,
                    'email' => $customer->email,
                    'phone_1' => $customer->phone_1,
                    'phone_2' => $customer->phone_2,
                    'address' => $customer->address,
                ];
            })
        ];
    } */

    public function toArray($request)
    {
        return ['data' => $this->collection];
    }
}
