<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryCollection;

class CountryController extends Controller
{
    public function index()
    {
        return new CountryCollection(Country::all());
    }

}
