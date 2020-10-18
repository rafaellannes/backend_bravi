<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/users', 'Api\UserController@getAllUsers');
Route::get('/users/{id}', 'Api\UserController@getUser');
Route::post('/users', 'Api\UserController@storeUser');
Route::delete('/users/{id}', 'Api\UserController@DestroyUser');
Route::put('/users/{id}', 'Api\UserController@UpdateUser');

Route::get('/contacts/{id}', 'Api\ContactController@getContactByUser');
Route::get('/contact/{id}', 'Api\ContactController@getContact');
Route::post('/contacts', 'Api\ContactController@storeContactByUser');
Route::put('/contacts/{id}', 'Api\ContactController@updateContact');
Route::delete('/contacts/{id}', 'Api\ContactController@destroyContact');
