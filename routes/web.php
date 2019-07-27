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





