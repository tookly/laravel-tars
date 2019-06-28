<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => '/Laravel/route'], function () {
    Route::get('/test', function () {
        \Illuminate\Support\Facades\Log::info('laravel tars test log');
        return 'Laravel Tars Test Success';
    });
});