<?php

Auth::routes(['verify' => TRUE]);
Route::group(['middleware' => ['admin', 'ban']], function() {
    Route::resource('categories', "CategoryController");
    Route::get('/user/ban/{id}', "UsersController@ban");
    Route::get('/user/unban/{id}', "UsersController@unban");
});
Route::group(['middleware' => 'auth'], function() {
    Route::post('/sendFeedback', "ProfileController@sendFeedback");
    Route::get('/getFeedback', "ProfileController@getFeedback");
    // cart control
    Route::get('/add-to-cart/{id}', "CartController@getAddToCart")->name('addToCart');
    Route::get('/shoppingCart', "CartController@getCart")->name('shoppingCart');
    Route::get('/cart/reduceOne/{id}', "CartController@reduceOne");
    Route::get('/cart/reduceAll/{id}', "CartController@reduceAll");
    // route for wishlist control
    Route::get('wishlist/{id}', "WishListController@add");
    Route::get('wishlist', "WishListController@list");
    Route::get('wishlist/remove/{id}', "WishListController@remove");
    
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
    Route::get('password/reset', "Auth\ForgotPasswordController@showLinkRequestForm");
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'Auth\ResetPasswordController@reset');
    Route::post('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
});
Route::get('/searchByCategory/{id}', "SearchController@searchByCategory");
Route::group(['middleware' => 'admin', 'auth'], function() {
    Route::get('/dashboard/showUserFeedbacks' , "UsersController@showUserFeedbacks");
    Route::get('/dashboard/markAsAllRead' , "UsersController@markAsAllRead");
    Route::get('/dashboard/markAsRead/{id}' , "UsersController@markAsRead");
    Route::get('/dashboard/deleteFeedback/{id}' , "UsersController@deleteFeedback");
    Route::get('/dashboard', "HomeController@admin");
    Route::get('/dashboard/products', "HomeController@products");
    Route::get('/dashboard/showTotalOrders', "HomeController@showTotalOrders");
    Route::get('/dashboard/categories', "HomeController@categories");
    Route::get('/dashboard/users', "HomeController@users");
    Route::get('/dashboard/orders', "HomeController@orders");
    Route::get('/dashboard/getCreditcardsDetails', "HomeController@cardsDetails");
    Route::get('/dashboard/getTotalCards', "CreditpointsCardsController@getTotalCards");
    Route::get('/dashboard/getUseableCards', "CreditpointsCardsController@getUseableCards");
    Route::get('/dashboard/getUsedCards', "CreditpointsCardsController@getUsedCards");
    Route::get('/dashboard/generateCards_i/{times}', "CreditpointsCardsController@generateCards_i");
    Route::get('/dashboard/generateCards_ii/{times}', "CreditpointsCardsController@generateCards_ii");
    Route::get('/dashboard/generateCards_iii/{times}', "CreditpointsCardsController@generateCards_iii");
    Route::get('/dashboard/usedCardDetails/{id}', "CreditpointsCardsController@usedCardDetails");
    Route::get('/dashboard/deleteAllUsedCardsHistory', "CreditpointsCardsController@deleteAllUsedCardsHistory");
    Route::get('/dashboard/userDetails/{id}', "UsersController@userDetails");
    Route::get('/dashboard/deleteHistory/{id}', "CreditpointsCardsController@deleteHistory");
    Route::get('/admin/routes', "HomeController@index");
    Route::post('/getDate', "HomeController@getDate")->name('getDate');
    Route::get('/users', "UsersController@index");
    Route::get('/user/destroy/{id}', "UsersController@delete");
    Route::get('/user/promote/{id}', "UsersController@promote");
    Route::get('/user/remove/{id}', "UsersController@remove");
});
Route::resource('products', "ProductController");
Route::get('/', "ProductController@index")->name('/');

//search
Route::get('/search','SearchController@index')->name('search');
Route::post('/search','SearchController@showResult')->name('search');



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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
