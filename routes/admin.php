<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController')->except('show');
Route::delete('news/{news}/images/{image}/delete', 'NewsController@deleteImage')
    ->name('news.images.delete');

Route::resource('events', 'EventController')->except('show');
Route::get('events/{event}/participants', 'EventController@participants')
    ->name('events.participants');
Route::delete('events/{event}/images/{image}/delete', 'EventController@deleteImage')
    ->name('events.images.delete');

Route::resource('albums', 'AlbumController')->except('show');
Route::delete('albums/{album}/images/{image}/delete', 'AlbumController@deleteImage')
    ->name('albums.images.delete');