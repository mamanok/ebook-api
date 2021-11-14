<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('me','App\Http\Controllers\AuthController@me');

Route::get('authors','App\Http\Controllers\AuthorController@index');
Route::post('authors','App\Http\Controllers\AuthorController@store');
Route::get('authors/{id}','App\Http\Controllers\AuthorController@show');
Route::put('authors/{id}','App\Http\Controllers\AuthorController@update');
Route::delete('authors/{id}','App\Http\Controllers\AuthorController@destroy');