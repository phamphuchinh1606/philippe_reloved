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

Route::get('/user/facebook/check-token', 'UserController@checkTokenFacebook')->name('api.customer.facebook.check_token');
Route::post('/user/social/create-login', 'UserController@createLoginSocial')->name('api.customer.social.create_login');
