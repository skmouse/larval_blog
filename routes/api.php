<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::post('/user/update/{id}', 'UserController@update');
Route::delete('/user/{id}', 'UserController@delete');
Route::get('/user/getInfo', 'UserController@getInfo');

/**
 * 内容
 */
Route::post('/content', 'ContentController@create');
Route::post('/content/{id}', 'ContentController@delete');
Route::put('/content/{id}', 'ContentController@update');




