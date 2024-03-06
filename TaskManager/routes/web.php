<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@Index');
Auth::routes();


Route::get('/{page}', 'App\Http\Controllers\IndexController')->where('page', '.*');
