<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\Project', 'prefix' => 'projects'], function(){
    Route::post('/', 'StoreController');
    Route::get('/', 'ProjectController');
    Route::get('/{project}', 'ShowController');
    Route::patch('/{project}', 'UpdateController');
    Route::delete('/{project}', 'DeleteController');
});


