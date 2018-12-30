<?php
use App\Product;
Route::group(['middleware' => ['auth']], function() {
});

Route::get('/test', function() {
    return view('test');
});
Route::get('email', "TestController@index");

Route::get('/', "ProductController@index");
Route::resource('products', "ProductController");
Route::resource('categories', "CategoryController");
// Route::get('/test', "TestController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/cart', "CartController@add");
// Route::get('/cart', "CartController@list");
// Route::post('/cart/remove', "CartController@remove");

// Route::get('/cart/remove/{id}', "CartController@remove")->name('cart.remove');
// Route::get('/cart/remove/all', "CartController@removeAll")->name('cart.removeAll');

Route::get('example', function( ) {
    return response("<h1>hello world</h1>", 200)
        ->header('Content-type', 'text/plain');
});
