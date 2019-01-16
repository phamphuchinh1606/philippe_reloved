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

Route::get('/tags', 'TagController@index')->name('tag.index');
Route::get('/tags/create', 'TagController@showCreate')->name('tag.create');
Route::post('/tags/create', 'TagController@store')->name('tag.create');
Route::get('/tags/edit/{id}', 'TagController@showEdit')->name('tag.edit');
Route::post('/tags/edit/{id}', 'TagController@edit')->name('tag.edit');
Route::get('/tags/delete/{id}', 'TagController@delete')->name('tag.delete');
