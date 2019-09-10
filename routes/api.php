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
Auth::routes();

Route::get('dashboard', function () {
    return view('admin.layouts.index');
});

Route::group(['middleware' => 'checkLogin'], function () {
    Route::apiResource('students', 'Api\StudentController');
    Route::get('student/profile', 'Api\StudentController@profile')->name('student.profile');
    Route::put('students/newUpdate/{student}', 'Api\StudentController@newUpdate')->name('student.newUpdate');
    Route::put('students/newUpdate1/{student}', 'Api\StudentController@newUpdate1')->name('student.newUpdate1');

    Route::resource('subjects', 'SubjectController');
    Route::resource('classes', 'ClassController');
    Route::resource('marks', 'MarkController');

    Route::get('search', 'StudentController@search');

    Route::get('students/{student}/account', 'Api\StudentController@account')->name('students.account');
    Route::get('students/{student}/more', 'Api\StudentController@more')->name('students.more');
    Route::put('students/add/{student}', 'Api\StudentController@add')->name('students.addMore');
    Route::put('students/editpopup', 'Api\StudentController@editpopup')->name('students.editpopup');
    Route::get('student/email', 'Api\StudentController@mail')->name('students.email');
    Route::put('student/{student}', 'Api\StudentController@send')->name('students.send');
    Route::get('student/sendAll', 'Api\StudentController@sendAll')->name('student.sendAll');
    Route::resource('users', 'UserController');
    Route::get('users/{user}/change', 'UserController@change')->name('users.change');
    Route::put('users/{user}/update', 'UserController@changed')->name('users.changed');
    Route::resource('faculties', 'FacultyController');
});

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');
