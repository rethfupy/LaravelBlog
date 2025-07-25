<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'App\Http\Controllers\Blog'], function () {
    Route::get('/','IndexController')->name('index');
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main', 'prefix' => 'overview'], function () {
        Route::get('/','IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Like', 'prefix' => 'likes'], function () {
        Route::get('/','IndexController')->name('personal.like.index');
        Route::delete('/{post}','DeleteController')->name('personal.like.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/','IndexController')->name('personal.comment.index');
        Route::delete('/{comment}','DeleteController')->name('personal.comment.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/','IndexController')->name('admin.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/','IndexController')->name('admin.post.index');
        Route::get('/create','CreateController')->name('admin.post.create');
        Route::post('/','StoreController')->name('admin.post.store');
        Route::get('/{post}','ShowController')->name('admin.post.show');
        Route::get('/{post}/edit','EditController')->name('admin.post.edit');
        Route::patch('/{post}','UpdateController')->name('admin.post.update');
        Route::delete('/{post}','DeleteController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/','IndexController')->name('admin.category.index');
        Route::get('/create','CreateController')->name('admin.category.create');
        Route::post('/','StoreController')->name('admin.category.store');
        Route::get('/{category}','ShowController')->name('admin.category.show');
        Route::get('/{category}/edit','EditController')->name('admin.category.edit');
        Route::patch('/{category}','UpdateController')->name('admin.category.update');
        Route::delete('/{category}','DeleteController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/','IndexController')->name('admin.tag.index');
        Route::get('/create','CreateController')->name('admin.tag.create');
        Route::post('/','StoreController')->name('admin.tag.store');
        Route::get('/{tag}','ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit','EditController')->name('admin.tag.edit');
        Route::patch('/{tag}','UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}','DeleteController')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/','IndexController')->name('admin.user.index');
        Route::get('/create','CreateController')->name('admin.user.create');
        Route::post('/','StoreController')->name('admin.user.store');
        Route::get('/{user}','ShowController')->name('admin.user.show');
        Route::get('/{user}/edit','EditController')->name('admin.user.edit');
        Route::patch('/{user}','UpdateController')->name('admin.user.update');
        Route::delete('/{user}','DeleteController')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);