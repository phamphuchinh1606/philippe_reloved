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

Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/products/create', 'ProductController@showCreate')->name('product.create');
Route::post('/products/create', 'ProductController@store')->name('product.create');
Route::get('/products/edit/{id}', 'ProductController@showEdit')->name('product.edit');
Route::post('/products/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::get('/products/delete/{id}', 'ProductController@delete')->name('product.delete');
