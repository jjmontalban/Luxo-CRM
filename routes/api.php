<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clientes','CustomerController');
Route::get('/cliente/{id}', 'CustomerController@show');
Route::get('cliente/buscar/{field}/{query}','CustomerController@search');
Route::get('provincias','ProvinceController@index');
Route::get('paises','CountryController@index');
















