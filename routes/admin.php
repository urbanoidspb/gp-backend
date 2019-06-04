<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::resource('news', 'NewsController')->except('show');

Route::resource('events', 'EventController')->except('show');
Route::get('events/{event}/participants', 'EventController@participants')
    ->name('events.participants');

Route::resource('albums', 'AlbumController')->except('show');
