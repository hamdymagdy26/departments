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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Auth\AuthController@register');
Route::post('login', 'Auth\AuthController@login');

// you must be authenticated to use the upcoming requests
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('departments', 'Departments\DepartmentController@index');
    Route::get('departments/{department}', 'Departments\DepartmentController@show');
    Route::post('departments', 'Departments\DepartmentController@store');
    Route::put('departments/{department}', 'Departments\DepartmentController@update');
    Route::delete('departments/{department}', 'Departments\DepartmentController@delete');
});
