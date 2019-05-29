<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController')->except('show');
Route::resource('events', 'EventController')->except('show');
Route::resource('albums', 'AlbumController')->except('show');
