<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Blog'], function () {
    Route::get('/','IndexController')->name('index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/','IndexController')->name('admin.index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/','IndexController')->name('admin.category.index');
        Route::get('/create','CreateController')->name('admin.category.create');
        Route::post('/','StoreController')->name('admin.category.store');
    });
});

Auth::routes();