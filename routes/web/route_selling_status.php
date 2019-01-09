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

Route::get('/selling-status', 'SellingStatusController@index')->name('selling_status.index');
Route::get('/selling-status/create', 'SellingStatusController@showCreate')->name('selling_status.create');
Route::post('/selling-status/create', 'SellingStatusController@store')->name('selling_status.create');
Route::get('/selling-status/edit/{id}', 'SellingStatusController@showEdit')->name('selling_status.edit');
Route::post('/selling-status/edit/{id}', 'SellingStatusController@edit')->name('selling_status.edit');
Route::get('/selling-status/delete/{id}', 'SellingStatusController@delete')->name('selling_status.delete');
