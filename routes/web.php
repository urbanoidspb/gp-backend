<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/auth', 'Admin\AuthController@index')->name('login.index');
Route::post('admin/auth', 'Admin\AuthController@login')->name('login');
Route::post('admin/logout', 'Admin\AuthController@logout')->name('logout');