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

Route::get('/sale-item', 'SaleItemController@index')->name('sale_item.index');
Route::get('/sale-item/create', 'SaleItemController@showCreate')->name('sale_item.create');
Route::post('/sale-item/create', 'SaleItemController@store')->name('sale_item.create');
Route::get('/sale-item/edit/{id}', 'SaleItemController@showEdit')->name('sale_item.edit');
Route::post('/sale-item/edit/{id}', 'SaleItemController@edit')->name('sale_item.edit');
Route::get('/sale-item/delete/{id}', 'SaleItemController@delete')->name('sale_item.delete');
