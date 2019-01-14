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

Route::get('/items', 'ItemController@index')->name('item.index');
Route::get('/items/create', 'ItemController@showCreate')->name('item.create');
Route::post('/items/create', 'ItemController@store')->name('item.create');
Route::get('/items/edit/{id}', 'ItemController@showEdit')->name('item.edit');
Route::post('/items/edit/{id}', 'ItemController@edit')->name('item.edit');
Route::get('/items/delete/{id}', 'ItemController@delete')->name('item.delete');
