<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'Site\SiteController@index')->name('index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

