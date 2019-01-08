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

Route::get('/models', 'ModelController@index')->name('model.index');
Route::get('/models/create', 'ModelController@showCreate')->name('model.create');
Route::post('/models/create', 'ModelController@store')->name('model.create');
Route::get('/models/edit/{id}', 'ModelController@showEdit')->name('model.edit');
Route::post('/models/edit/{id}', 'ModelController@edit')->name('model.edit');
Route::get('/models/delete/{id}', 'ModelController@delete')->name('model.delete');
