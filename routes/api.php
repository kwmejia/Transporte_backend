<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/routes', 'App\Http\Controllers\RoutesController@index');
Route::get('/routes/{idRoute}', 'App\Http\Controllers\RoutesController@getById');
Route::post('/routes', 'App\Http\Controllers\RoutesController@insert');
Route::put('/routes', 'App\Http\Controllers\RoutesController@update');
Route::delete('/routes', 'App\Http\Controllers\RoutesController@delete');

Route::get('/customers', 'App\Http\Controllers\CustomersController@index');
Route::get('/customers/{idCustomer}', 'App\Http\Controllers\CustomersController@getById');
Route::get('/customers/byroute', 'App\Http\Controllers\CustomersController@getByRoute');
Route::post('/customers', 'App\Http\Controllers\CustomersController@insert');
Route::put('/customers', 'App\Http\Controllers\CustomersController@update');
Route::delete('/customers', 'App\Http\Controllers\CustomersController@delete');
