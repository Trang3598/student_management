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

    Route::group(['prefix' => 'student'], function () {
        Route::get('list', 'StudentController@list');
        Route::get('edit/{id}', 'StudentController@edit');
        Route::get('create', 'StudentController@create');
        Route::post('postFormStudent', 'StudentController@postFormStudent')->name('student.postForm');
        Route::post('postEditFormStudent/{student}', 'StudentController@postEditFormStudent')->name('student.update');
        Route::get('delete/{id}', 'StudentController@delete')->name('student.delete');
    });

    Route::group(['prefix' => 'faculty'], function () {
        Route::get('list', 'FacultyController@list')->name('faculty.list');
        Route::get('edit/{id}', 'FacultyController@edit')->name('faculty.edit');
        Route::get('create', 'FacultyController@create')->name('faculty.create');
        Route::post('postFormFaculty', 'FacultyController@postFormFaculty')->name('faculty.postForm');
        Route::post('postEditFormFaculty/{faculty}', 'FacultyController@postEditFormFaculty')->name('faculty.update');
        Route::get('delete/{id}', 'FacultyController@delete')->name('faculty.delete');
    });
    Route::group(['prefix' => 'class'], function () {
        Route::get('list', 'ClassController@list')->name('class.list');
        Route::get('edit/{id}', 'ClassController@edit')->name('class.edit');
        Route::get('create', 'ClassController@create')->name('class.create');
        Route::post('postFormClass', 'ClassController@postFormClass')->name('class.postFormClass');
        Route::post('postEditFormClass/{class}', 'ClassController@postEditFormClass')->name('class.update');
        Route::get('delete/{id}', 'ClassController@delete');
    });
    Route::group(['prefix' => 'subject'], function () {
        Route::get('list', 'SubjectController@list')->name('subject.list')->name('subject.list');
        Route::get('edit/{id}', 'SubjectController@edit')->name('subject.edit')->name('subject.edit');
        Route::get('create', 'SubjectController@create')->name('subject.create');
        Route::post('postFormSubject', 'SubjectController@postFormSubject')->name('subject.postForm');
        Route::post('postEditFormSubject/{subject}', 'SubjectController@postEditFormSubject')->name('subject.update');
        Route::get('delete/{id}', 'SubjectController@delete')->name('subject.delete');
    });
    Route::group(['prefix' => 'studentsubject'], function () {
        Route::get('list', 'StudentSubjectController@list')->name('studentsubject.list');
        Route::get('edit/{studentSubject}', 'StudentSubjectController@edit')->name('studentsubject.edit');
        Route::get('create', 'StudentSubjectController@create')->name('studentsubject.create');
        Route::post('postFormResult', 'StudentSubjectController@postFormResult')->name('subject.postFormResult');
        Route::get('delete/{studentSubject}', 'StudentSubjectController@delete')->name('studentsubject.delete');
        Route::post('postEditFormResult/{studentSubject}', 'SubjectController@postEditFormResult')->name('studentsubject.update');
    });

//Route::resource('results', 'StudentSubjectController');
});


