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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category-list', 'HomeController@index');
Route::get('/category-add', 'HomeController@index');
Route::get('/category-edit/{id}', 'HomeController@index');
Route::get('/post-list', 'HomeController@index');
Route::get('/post-add', 'HomeController@index');
Route::get('/post-edit/{id}', 'HomeController@index');
Route::get('/clientes', 'HomeController@index');
Route::get('/blog', 'BlogController@index');



Route::group(['middleware' => ['auth']], function () {
    //category
    Route::post('/update-category/{id}', 'CategoryController@update')->name('updateCategory');
    Route::get('/edit-category/{id}', 'CategoryController@edit')->name('editCategory');
    Route::get('/delete-category/{id}', 'CategoryController@delete')->name('deleteCategory');
    Route::get('/delete-category-selected/{id}', 'CategoryController@deleteSelected')->name('deleteSelectedCat');
    Route::get('/list-category', 'CategoryController@index')->name('listCategory');
    Route::post('/add-category', 'CategoryController@add')->name('addCategory');

//Post
    Route::get('/list-post', 'PostController@index')->name('listPost');
    Route::post('/add-post', 'PostController@add')->name('addPost');
    Route::get('/delete-post/{id}', 'PostController@delete')->name('deletePost');
    Route::get('/edit-post/{id}', 'PostController@edit')->name('editPost');
    Route::post('/update-post/{id}', 'PostController@update')->name('updatePost');

//Employee
   // Route::get('/employee', 'EmployeeController')->name('employee');
});

Route::get('/blog-posts/{id}', 'BlogController@getPost')->name('blogData');
Route::get('/latest-posts', 'BlogController@latestPosts')->name('latestData');
Route::get('/blog-single-post/{id}', 'BlogController@getSinglePost')->name('blogSingleData');
Route::get('/list-category-frontend', 'BlogController@categoryFrontend')->name('catData');
Route::get('/search', 'BlogController@searchData')->name('sData');
