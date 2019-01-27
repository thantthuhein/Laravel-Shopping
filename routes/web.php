<?php
use App\Product;
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::resource('products', "ProductController");
    Route::resource('categories', "CategoryController");
});
Route::get('/', "ProductController@index");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', "HomeController@admin")->middleware('admin');
Route::get('/dashboard/categories', "HomeController@categories")->middleware('admin');
Route::get('/dashboard/users', "HomeController@users")->middleware('admin');
Route::get('/admin/routes', "HomeController@index")->middleware('admin');
Route::get('/users', "UsersController@index")->middleware('admin');
Route::get('/user/destroy/{id}', "UsersController@delete")->middleware('admin');
Route::get('/user/promote/{id}', "UsersController@promote")->middleware('admin');

Route::get('/test', function() {
    return view('test');
});
Route::get('email', "TestController@index");

// Route::get('/test', "TestController@index");

Auth::routes();
// route for cart control
Route::get('cart/{id}', "CartController@add");
Route::get('cart', "CartController@list");
Route::get('cart/remove/{id}', "CartController@remove");
// route for wishlist control
Route::get('wishlist/{id}', "WishListController@add");
Route::get('wishlist', "WishListController@list");
Route::get('wishlist/remove/{id}', "WishListController@remove");

Route::get('example', "ProductController@example");
// Route::get('/cart/remove/{id}', "CartController@remove")->name('cart.remove');
// Route::get('/cart/remove/all', "CartController@removeAll")->name('cart.removeAll');

// Route::get('example', function( ) {
//     return response("<h1>hello world</h1>", 200)
//         ->header('Content-type', 'text/plain');
// });
