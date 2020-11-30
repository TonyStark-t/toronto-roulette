<?php

use Illuminate\Http\Request;

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

Route::get('/slots', 'SlotsController@index');
Route::post('/slot/create', 'SlotsController@create');
Route::post('/slot/edit', 'SlotsController@edit');
Route::post('/slot/delete', 'SlotsController@delete');