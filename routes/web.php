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

Route::group(['middleware'=> ['auth']], function() {
    Route::get('/home', 'HomeController@index');

    //food
    Route::get('/foods', 'FoodsController@index');
    Route::get('/foods/create', 'FoodsController@create');
    Route::post('/foods', 'FoodsController@store');
    Route::get('/foods/{food}', 'FoodsController@show');
    Route::get('/foods/{food}/edit', 'FoodsController@edit');
    Route::patch('/foods/{food}', 'FoodsController@update');
    Route::delete('/foods/{food}/delete', 'FoodsController@destroy');

    //search
    Route::get('/search', 'SearchController@index');
    Route::get('/search/find', 'SearchController@find');


    // Route::resource('foods', 'FoodsController');


});

Auth::routes();
