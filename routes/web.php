<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::view('/','frontend.frontendMaster')->name('frontEnd'); */
Route::view('/','auth.login')->name('login');

Auth::routes();

// Rutas del enrutador de Vue (route-link)
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clientes', 'HomeController@index');
Route::get('/cliente/{id}', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {

});
