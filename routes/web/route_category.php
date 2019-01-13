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

Route::get('/categories', 'CategoryController@index')->name('category.index');
Route::get('/categories/create', 'CategoryController@showCreate')->name('category.create');
Route::post('/categories/create', 'CategoryController@store')->name('category.create');
Route::get('/categories/edit/{id}', 'CategoryController@showEdit')->name('category.edit');
Route::post('/categories/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::get('/categories/delete/{id}', 'CategoryController@delete')->name('category.delete');
