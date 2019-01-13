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

Route::get('/colors', 'ColorController@index')->name('color.index');
Route::get('/colors/create', 'ColorController@showCreate')->name('color.create');
Route::post('/colors/create', 'ColorController@store')->name('color.create');
Route::get('/colors/edit/{id}', 'ColorController@showEdit')->name('color.edit');
Route::post('/colors/edit/{id}', 'ColorController@edit')->name('color.edit');
Route::get('/colors/delete/{id}', 'ColorController@delete')->name('color.delete');
