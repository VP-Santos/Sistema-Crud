<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', 'App\Http\Controllers\ProductsController@index')->name('index');
Route::get('/create', 'App\Http\Controllers\ProductsController@create')->name('create');
Route::post('/', 'App\Http\Controllers\ProductsController@store')->name('store');
Route::get('/edit/{id}', 'App\Http\Controllers\ProductsController@edit')->name('edit');
Route::put('', 'App\Http\Controllers\ProductsController@update')->name('update');
Route::delete('/delete/{id}', 'App\Http\Controllers\ProductsController@destroy')->name('delete');

