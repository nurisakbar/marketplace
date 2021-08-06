<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::post('/me', 'AuthController@me');
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::get('/category', 'CategoryController@index');
    Route::get('/category/{id}', 'CategoryController@show');
    Route::put('/category/{id}', 'CategoryController@update');
    Route::delete('/category/{id}', 'CategoryController@destroy');
    Route::post('/category', 'CategoryController@store');

    Route::get('/article', 'ArticleController@index');
    Route::get('/article/{id}', 'ArticleController@show');
    Route::put('/article/{id}', 'ArticleController@update');
    Route::delete('/article/{id}', 'ArticleController@destroy');
    Route::post('/article', 'ArticleController@store');

    Route::get('/harvest', 'HarvestController@index');
    Route::get('/harvest/{id}', 'HarvestController@show');
    Route::put('/harvest/{id}', 'HarvestController@update');
    Route::delete('/harvest/{id}', 'HarvestController@destroy');
    Route::post('/harvest', 'HarvestController@store');

    Route::get('/user_address', 'UserAddressController@index');
    Route::get('/user_address/{id}', 'UserAddressController@show');
    Route::put('/user_address/{id}', 'UserAddressController@update');
    Route::delete('/user_address/{id}', 'UserAddressController@destroy');
    Route::post('/user_address', 'UserAddressController@store');

    // Route Article
    Route::get('/article', 'ArticleController@index');
    Route::get('/article/{id}', 'ArticleController@show');
    Route::put('/article/{id}', 'ArticleController@update');
    Route::delete('/article/{id}', 'ArticleController@destroy');
    Route::post('/article', 'ArticleController@store');
    
    // Route User
    Route::delete('/users/{id}', 'UserController@destroy');
    Route::get('/users', 'UserController@index');
    Route::get('/users/{id}', 'UserController@show');
    Route::post('/users', 'UserController@store');
    Route::put('/users/{id}', 'UserController@update');

    // Route Transaction
    Route::delete('/transactions/{id}', 'TransactionController@destroy');
    Route::get('/transactions', 'TransactionController@index');
    Route::get('/transactions/{id}', 'TransactionController@show');
    Route::post('/transactions', 'TransactionController@store');
    Route::put('/transactions/{id}', 'TransactionController@update');
    
    // Route Forum
    Route::delete('/forum/{id}', 'ForumController@destroy');
    Route::get('/forum', 'ForumController@index');
    Route::get('/forum/{id}', 'ForumController@show');
    Route::post('/forum', 'ForumController@store');
    Route::put('/forum/{id}', 'ForumController@update');

    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/{id}', 'StoreController@show');
    Route::put('/stores/{id}', 'StoreController@update');
    Route::delete('/stores/{id}', 'StoreController@destroy');
    Route::post('/stores', 'StoreController@create');

    Route::get('/video', 'VideoController@index');
    Route::get('/video/{id}', 'VideoController@show');
    Route::put('/video/{id}', 'VideoController@update');
    Route::delete('/video/{id}', 'VideoController@destroy');
    Route::post('/video', 'VideoController@store');
});


Route::group(['middleware' => 'api', 'prefix' => 'api/user'], function ($router) {
    Route::get('/', 'UserController@index');
});
