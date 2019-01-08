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

Route::get('/brands', 'BrandController@index')->name('brand.index');
Route::get('/brands/create', 'BrandController@showCreate')->name('brand.create');
Route::post('/brands/create', 'BrandController@store')->name('brand.create');
Route::get('/brands/edit/{id}', 'BrandController@showEdit')->name('brand.edit');
Route::post('/brands/edit/{id}', 'BrandController@edit')->name('brand.edit');
