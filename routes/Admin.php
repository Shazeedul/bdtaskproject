<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/neworder', 'App\Http\Controllers\Admin\OrderController@index')->name('neworder');
Route::get('/logout','App\Http\Controllers\Admin\DashboardController@logout')->name('logout');

