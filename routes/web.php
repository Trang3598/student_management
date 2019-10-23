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
/*
* Login
*/
Auth::routes();

Route::get('dashboard', function () {
    return view('admin.layouts.index');
});
Route::get('students/create','StudentController@create')->name('students.create');
Route::post('students','StudentController@store')->name('students.store');

Route::group(['middleware' => ['checkLogin','lang']], function () {
    Route::resource('students', 'StudentController')->except(['create','store']);
    Route::get('student/profile', 'StudentController@profile')->name('student.profile');
    Route::put('students/newUpdate/{student}', 'StudentController@newUpdate')->name('student.newUpdate');
    Route::put('students/newUpdate1/{student}', 'StudentController@newUpdate1')->name('student.newUpdate1');
    Route::get('students/editRole/{role}', 'StudentController@roles')->name('students.roles');
    Route::put('students/updateRole/{role}', 'StudentController@updateRole')->name('students.updateRole');
    Route::get('students/editPermission/{permission}', 'StudentController@permissions')->name('students.permissions');
    Route::put('students/updatePermission/{permission}', 'StudentController@updatePermission')->name('students.updatePermission');
    Route::get('students/{student}/account', 'StudentController@account')->name('students.account');
    Route::get('students/{student}/more', 'StudentController@more')->name('students.more');
    Route::put('students/add/{student}', 'StudentController@add')->name('students.addMore');
    Route::put('students/editpopup', 'StudentController@editpopup')->name('students.editpopup');
    Route::get('student/email', 'StudentController@mail')->name('students.email');
    Route::put('student/{student}', 'StudentController@send')->name('students.send');
    Route::get('student/sendAll', 'StudentController@sendAll')->name('student.sendAll');
    Route::get('search', 'StudentController@search');

    Route::resource('faculties', 'FacultyController');
    Route::resource('subjects', 'SubjectController');
    Route::resource('classes', 'ClassController');
    Route::resource('marks', 'MarkController');
    Route::resource('permissions', 'PermissionController');

    Route::resource('users', 'UserController');
    Route::get('users/{user}/change', 'UserController@change')->name('users.change');
    Route::put('users/{user}/update', 'UserController@changed')->name('users.changed');



    Route::resource('roles', 'RolesController');
    Route::get('roles/{role}/more', 'RolesController@more')->name('roles.more');
    Route::put('roles/add/{role}', 'RolesController@add')->name('roles.add');

    Route::get('lang/{lang}','LangController@lang')->name('lang');
    Route::get('chats', 'ChatController@index')->name('chats');
    Route::get('message/{id}','ChatController@getMessage')->name('message');
    Route::post('chat','ChatController@chat');
});

Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');



