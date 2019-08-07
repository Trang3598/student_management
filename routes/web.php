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

Route::get('dashboard',function (){
    return view('admin.layouts.index');
});
/**
 * Route Faculty
 */
Route::resource('faculties', 'FacultyController');

/**
 * Route Student
 */
Route::resource('students', 'StudentController');
/**
 * Route Subject
 */
Route::resource('subjects', 'SubjectController');
/**
 * Route Class
 */
Route::resource('classes', 'ClassController');
/**
 * Route Mark
 */
Route::resource('marks', 'MarkController');
/*
 * Route Search
 */
Route::get('search', 'StudentController@search');
/*
 * Route View Add more
 */
Route::get('students/{student}/account','StudentController@account')->name('students.account');
/*
 * Route View Add more
 */
Route::get('students/{student}/more','StudentController@more')->name('students.more');
/*
 * Route Add more
 */
Route::put('students/{student}','StudentController@add')->name('students.addMore');
/*
 * List Warning
 */
Route::get('student/email','StudentController@mail')->name('students.email');
/*
 * Send Mail
 */
Route::put('student/{student}','StudentController@send')->name('students.send');
/*
 *
 */
Route::get('student/sendAll','StudentController@sendAll')->name('student.sendAll');
/*
 * Edit account
 */
Route::get('users/{user}/edit','UserController@edit')->name('users.edit');
/*
 * Update account
 */
Route::put('users/{user}/update','UserController@update')->name('users.update');
/*
 * Change password
 */
Route::get('users/{user}/change','UserController@change')->name('users.change');
/*
 * Changed password
 */
Route::put('users/{user}/update','UserController@changed')->name('users.changed');



