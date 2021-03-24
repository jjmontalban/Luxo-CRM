<?php

namespace App\Http\Controllers\Api;

use App\Province;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceCollection;

class ProvinceController extends Controller
{
    public function index()
    {
        /* return new ProvinceCollection(Province::where('id_country', $country)->all()); */

        return new ProvinceCollection(Province::all());
/* 
        $provinces = Province::orderBy('id', 'desc')->get();
    return response()->json([:where($field,'LIKE',"%$query%")
            "provinces_data" => $provinces
        ], 200); */
    }

}
