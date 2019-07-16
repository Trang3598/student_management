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

Route::get('/dashboard',function (){
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
Route::get('/subject/add','SubjectController@create');
Route::get('/subject/store','SubjectController@store');
Route::get('/subject/edit','SubjectController@edit');
Route::get('/subject/update','SubjectController@update');
Route::get('/subject/show','SubjectController@show');
Route::get('/subject/delete','SubjectController@delete');
/**
 * Route Class
 */
Route::get('/class/add','ClassController@create');
Route::get('/class/store','ClassController@store');
Route::get('/class/edit','ClassController@edit');
Route::get('/class/update','ClassController@update');
Route::get('/class/show','ClassController@show');
Route::get('/class/delete','ClassController@delete');

