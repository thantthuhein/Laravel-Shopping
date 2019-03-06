<?php

Auth::routes(['verify' => TRUE]);
Route::group(['middleware' => ['admin', 'ban']], function() {
    Route::resource('products', "ProductController");
    Route::resource('categories', "CategoryController");
    Route::get('/user/ban/{id}', "UsersController@ban");
    Route::get('/user/unban/{id}', "UsersController@unban");
});
Route::group(['middleware' => 'auth'], function() {
    Route::get('/getChangeInfo', "ProfileController@getChangeInfo");
    Route::post('/changeInfo', "ProfileController@changeInfo")->name('changeInfo');
    // checkout
    Route::get('/checkout', "CartController@getCheckout")->name('checkout');
    Route::post('/checkout', "CartController@postCheckout")->name('postCheckout');
    Route::get('/home', 'ProfileController@getProfile')->name('getProfile');
    Route::get('/getProfile', "ProfileController@getProfile")->name('getProfile');
    Route::get('/getDeliver/{id}', "CartController@getDeliver");
    Route::get('/getCreditDetails', "ProfileController@getCreditDetails");
    Route::get('/getEnterPin', "ProfileController@enterPin");
    Route::post('/topUpCredits', "ProfileController@topUpCredits");
    // reset password 
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\ResetPasswordController@reset');
    Route::post('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
});


Route::group(['middleware' => 'admin'], function() {
    Route::get('/dashboard', "HomeController@admin");
    Route::get('/dashboard/categories', "HomeController@categories");
    Route::get('/dashboard/users', "HomeController@users");
    Route::get('/dashboard/orders', "HomeController@orders");
    Route::get('/dashboard/getCreditcardsDetails', "HomeController@cardsDetails");
    Route::get('/dashboard/getTotalCards', "CreditpointsCardsController@getTotalCards");
    Route::get('/dashboard/getUseableCards', "CreditpointsCardsController@getUseableCards");
    Route::get('/dashboard/getUsedCards', "CreditpointsCardsController@getUsedCards");
    Route::get('/admin/routes', "HomeController@index");
    Route::post('/getDate', "HomeController@getDate")->name('getDate');
    Route::get('/users', "UsersController@index");
    Route::get('/user/destroy/{id}', "UsersController@delete");
    Route::get('/user/promote/{id}', "UsersController@promote");
    Route::get('/user/remove/{id}', "UsersController@remove");
});
Route::get('/', "ProductController@index")->name('/');
// route for cart control
Route::get('/add-to-cart/{id}', "CartController@getAddToCart")->name('addToCart');
Route::get('/shoppingCart', "CartController@getCart")->name('shoppingCart');
Route::get('/cart/remove/{id}', "CartController@remove");

// route for wishlist control
Route::get('wishlist/{id}', "WishListController@add");
Route::get('wishlist', "WishListController@list");
Route::get('wishlist/remove/{id}', "WishListController@remove");








// testing
Route::get('example', "ProductController@example");
Route::get('/test', function() {
    return view('test');
});
Route::get('email', "TestController@index");
// Route::get('/cart/remove/{id}', "CartController@remove")->name('cart.remove');
// Route::get('/cart/remove/all', "CartController@removeAll")->name('cart.removeAll');

// Route::get('example', function( ) {
    //     return response("<h1>hello world</h1>", 200)
    //         ->header('Content-type', 'text/plain');
    // });

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
