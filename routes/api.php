<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('lists', 'ListController@index');
Route::get('list/{id}', 'ListController@show');
Route::post('list', 'ListController@save');
Route::put('list/{id}', 'ListController@update');
Route::delete('list/{id}', 'ListController@delete');
