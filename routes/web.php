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

Route::get('/category', 'CategoryController@index');
Route::get('/category/create', 'CategoryController@create');
Route::post('/category/{category}', 'CategoryController@store');
Route::get('category/{category}/edit', 'CategoryController@edit');
Route::put('category/{category}', 'CategoryController@update');
Route::get('category/{category}/delete', 'CategoryController@delete');
Route::delete('category/{category}', 'CategoryController@destroy');

Route::get('/items', 'ItemController@index');
Route::get('/items/create', 'ItemController@create');
Route::post('/items/{item}', 'ItemController@store');
Route::get('items/{item}/edit', 'ItemController@edit');
Route::put('items/{item}', 'ItemController@update');
Route::get('items/{item}/delete', 'ItemController@delete');
Route::delete('items/{item}', 'ItemController@destroy');

Route::get('/filters/create', 'FilterController@create');
Route::post('/filters', 'FilterController@report');
