<?php
Route::group(['middleware' => ['auth']], function() {
});

Route::get('test', function() {
    return view('test');
});

Route::get('/', "ProductController@index");
Route::resource('products', "ProductController");
Route::resource('categories', "CategoryController");
// Route::get('/test', "TestController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('cart', "CartController@cart");
Route::get('list', "CartController@list");

