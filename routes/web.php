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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
        Route::resource('login', 'LoginController');
        Route::resource('user', 'UserController');
        Route::resource('faculty','Faculty2Controller');
        Route::resource('subject','Subject2Controller');
        Route::resource('class','Class2Controller');
        Route::resource('student','Student2Controller');
        Route::resource('studentsubject','StudentSubject2Controller');
});


