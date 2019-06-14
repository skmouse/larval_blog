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



Route::post('/register', 'UsersController@register');
Route::post('/login', 'UsersController@login');
Route::post('/user/{id}', 'UsersController@update');
Route::delete('/users/{id}', 'UsersController@delete');
Route::get('/users/getInfo', 'UsersController@getInfo');


/**
 * 内容
 */
Route::post('/content', 'ContentController@create');
Route::post('/content/{id}', 'ContentController@delete');
Route::put('/content/{id}', 'ContentController@update');


Route::get('/getAllContent', 'UsersController@getAllContent');






Route::get('test', function () {
    return 'Hello World';
});




