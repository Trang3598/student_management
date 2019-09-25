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

Route::name('api.')->group(function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('faculties', 'Api\FacultyController@index')->name('faculties.index');

    Route::put('faculties/{faculty}', 'Api\FacultyController@store')->name('faculties.store');

    Route::put('faculties/{faculty}', 'Api\FacultyController@show')->name('faculties.show');

    Route::patch('faculties/{faculty}', 'Api\FacultyController@update')->name('faculties.update');

    Route::delete('faculties/{faculty}', 'Api\FacultyController@destroy')->name('faculties.destroy');
});
