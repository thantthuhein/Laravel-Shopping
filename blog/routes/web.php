<?php

Route::group(['middleware' => ['auth']], function() {
    Route::resource('products', "ProductController");
    Route::get('/', "ProductCon troller@index");
});

Route::resource('categories', "CategoryController");
Route::post('cart', "CartController@cart");
Route::get('list', "CartController@list");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
