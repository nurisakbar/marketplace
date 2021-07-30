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
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::get('/category', 'CategoryController@index');
    Route::get('/category/{id}', 'CategoryController@show');
    Route::put('/category/{id}', 'CategoryController@update');
    Route::delete('/category/{id}', 'CategoryController@destroy');
    Route::post('/category', 'CategoryController@store');
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::get('/harvest', 'HarvestController@index');
    Route::get('/harvest/{id}', 'HarvestController@show');
    Route::put('/harvest/{id}', 'HarvestController@update');
    Route::delete('/harvest/{id}', 'HarvestController@destroy');
    Route::post('/harvest', 'HarvestController@store');
});

Route::group(['middleware' => 'api','prefix' => 'api/user'], function ($router) {
    Route::get('/', 'UserController@index');
    Route::get('/category', 'CategoryController@index');
});
