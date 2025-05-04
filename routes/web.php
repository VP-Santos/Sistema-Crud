<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

route::prefix('products')->group(function () {
    Route::get('/', 'App\Http\Controllers\ProductsController@index')->name('index-products');
    Route::get('/create', 'App\Http\Controllers\ProductsController@create')->name('create-products');
    Route::post('/store', 'App\Http\Controllers\ProductsController@store')->name('store-products');
    Route::get('/edit/{id}', 'App\Http\Controllers\ProductsController@edit')->name('edit-products');
    Route::put('/update/{id}', 'App\Http\Controllers\ProductsController@update')->name('update-products');
    Route::delete('/delete/{id}', 'App\Http\Controllers\ProductsController@destroy')->name('delete-products');
    //route Ajax
    Route::get('/search', [SearchController::class, 'search'])->name('search-products');
});

// Route::prefix('Users')->group(function () {
//     Route::get('/', 'App\Http\Controllers\UsersController@index')->name('index');
//     Route::get('/create', 'App\Http\Controllers\UsersController@create')->name('create');
//     Route::post('/store', 'App\Http\Controllers\UsersController@store')->name('store');
//     Route::get('/edit/{id}', 'App\Http\Controllers\UsersController@edit')->name('edit');
//     Route::put('/update/{id}', 'App\Http\Controllers\UsersController@update')->name('update');
//     Route::delete('/delete/{id}', 'App\Http\Controllers\UsersController@destroy')->name('delete');
// });

Route::get('/', function () {
    return view('login');
});
?>