<?php

namespace App\Http\Controllers\Api;

use App\Province;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceCollection;

class ProvinceController extends Controller
{
    public function index()
    {
        return new ProvinceCollection(Province::all());
    }

}
