<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'members',
], function () {
    Route::post('join', 'MemberController@store');
});

Route::group([
    'prefix' => 'news',
], function () {
    Route::get('/', 'NewsController@index');
});

Route::group([
    'prefix' => 'albums',
], function () {
    Route::get('/', 'AlbumController@index');
});

Route::group([
    'prefix' => 'events',
], function () {
    Route::get('/', 'EventController@index');
    Route::post('{event}/join', 'EventController@join');
});