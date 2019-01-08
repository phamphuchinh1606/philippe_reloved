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

Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/users/create', 'UserController@showCreate')->name('user.create');
Route::post('/users/create', 'UserController@store')->name('user.create');
Route::get('/users/edit/{id}', 'UserController@showEdit')->name('user.edit');
Route::post('/users/edit/{id}', 'UserController@edit')->name('user.edit');
