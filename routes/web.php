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

Route::get('/', function () {
    return view('welcome');
});


//google map
Route::get('/map', function() {
    return view('location.index');
});

    //beli
Route::post('addToCart', ['middleware' => ['web', 'auth'], 'uses' =>'FoodsController@addToCart']); //bila nak masuk addtocart dia akan lalu web dlu then check betol ke dah login
Route::get('shopping-cart', ['middleware' => ['web', 'auth'], 'uses' => 'FoodsController@viewCart']);

Route::group(['middleware'=> ['auth']], function() {
    Route::get('/home', 'HomeController@index');

    Route::get('/chart', 'FoodsController@charts');


    //food
    Route::get('/foods', 'FoodsController@index');
    Route::get('/foods/create', 'FoodsController@create');
    Route::post('/foods', 'FoodsController@store');
    Route::get('/foods/{food}', 'FoodsController@show');
    Route::get('/foods/{food}/edit', 'FoodsController@edit');
    Route::get('/foods/{food}/buy', 'FoodsController@buy');
    Route::patch('/foods/{food}', 'FoodsController@update');
    Route::delete('/foods/{food}/delete', 'FoodsController@destroy');


    //search
    Route::get('/search', 'SearchController@index');
    Route::get('/search/find', 'SearchController@find');

    //order
    Route::get('/orders', 'OrdersController@index');
    Route::get('/orders/create', 'OrdersController@create');
    Route::post('/orders', 'OrdersController@store');
    Route::get('/orders/{order}', 'OrdersController@show');
    Route::get('/orders/{order}/edit', 'OrdersController@edit');
    Route::patch('/orders/{order}', 'OrdersController@update');
    Route::delete('/orders/{order}/delete', 'OrdersController@destroy');

    //profiles
    Route::get('/profiles', 'ProfilesController@index');
    Route::get('/profiles/{profile}/edit', 'ProfilesController@edit');
    Route::patch('/profiles/{profile}', 'ProfilesController@update');
    Route::get('/profiles/{user_id}/details', 'ProfilesController@show');


    //reviews
    Route::get('/profiles/{user_id}/comments', 'ReviewController@index');  
    Route::get('/profiles/{review}', 'ReviewController@show');
    Route::get('/profiles/{review}/edit', 'ReviewController@edit');
    Route::delete('/profiles/{review}/delete', 'ReviewController@destroy');
    Route::post('/profiles', 'ReviewController@store');

    //likes
    Route::post('/profiles/{profile}/like', 'LikesController@likesAction');

    //ajax
    Route::get('/ajax-district', 'SearchController@ajax');
    Route::get('/ajax-subdistrict', 'SearchController@ajax2');



    // Route::resource('foods', 'FoodsController');


});

Auth::routes();
