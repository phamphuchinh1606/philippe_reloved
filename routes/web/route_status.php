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

Route::get('/status', 'StatusController@index')->name('status.index');
Route::get('/status/create', 'StatusController@showCreate')->name('status.create');
Route::post('/status/create', 'StatusController@store')->name('status.create');
Route::get('/status/edit/{id}', 'StatusController@showEdit')->name('status.edit');
Route::post('/status/edit/{id}', 'StatusController@edit')->name('status.edit');
Route::get('/status/delete/{id}', 'StatusController@delete')->name('status.delete');
