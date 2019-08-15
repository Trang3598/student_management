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
Route::get('addmore/{id}', 'StudentSubjectController@addMore')->name('studentsubject.addmore');
Route::post('studentsubject', 'StudentSubjectController@addMoreAction')->name('studentsubject.addMoreAction');
Route::get('destroyMore/{id}', 'StudentSubjectController@destroyMore')->name('studentsubject.destroyMore');
Route::get('student', 'StudentController@search')->name('student.search');
Route::get('sendMail/{id}', 'StudentController@sendMail')->name('student.sendMail');
Route::get('sendAll', 'StudentController@sendMails')->name('student.sendAll');
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

    Route::resource('user', 'UserController');
    Route::resource('faculty', 'FacultyController');
    Route::resource('subject', 'SubjectController');
    Route::resource('class', 'ClassController');
    Route::resource('student', 'StudentController');
    Route::resource('studentsubject', 'StudentSubjectController');
    Auth::routes();
});
Route::get('callback/{provider}','Auth\LoginController@handleProviderCallback');
Route::get('login/{provider}','Auth\LoginController@redirect');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
