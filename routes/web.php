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



    Route::get('/user_address', 'UserAddressController@index');
    Route::get('/user_address/{id}', 'UserAddressController@show');
    Route::put('/user_address/{id}', 'UserAddressController@update');
    Route::delete('/user_address/{id}', 'UserAddressController@destroy');
    Route::post('/user_address', 'UserAddressController@store');

    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/{id}', 'StoreController@show');
    Route::put('/stores/{id}', 'StoreController@update');
    Route::delete('/stores/{id}', 'StoreController@destroy');
    Route::post('/stores', 'StoreController@create');
});


Route::group(['middleware' => 'api', 'prefix' => 'api/user'], function ($router) {
    Route::get('/', 'UserController@index');
    Route::get('/category', 'CategoryController@index');
});
