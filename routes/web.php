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
    return view('auth.login');
});
Route::get('addmore/{id}', 'StudentSubjectController@addMore')->name('studentsubject.addmore');
Route::post('studentsubject', 'StudentSubjectController@addMoreAction')->name('studentsubject.addMoreAction');
Route::get('destroyMore/{id}', 'StudentSubjectController@destroyMore')->name('studentsubject.destroyMore');
Route::get('student', 'StudentController@search')->name('student.search');
Route::get('sendMail/{id}', 'StudentController@sendMail')->name('student.sendMail');
Route::get('sendAll', 'StudentController@sendMails')->name('student.sendAll');
Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');

});
Route::group(['prefix' => 'admin', 'middleware' => ['auth','locale']], function () {
    Route::resource('user', 'UserController');
    Route::resource('faculty', 'FacultyController');
    Route::resource('subject', 'SubjectController');
    Route::resource('class', 'ClassController');
    Route::resource('student', 'StudentController');
    Route::get('student/{student}/showImage', 'StudentController@showImage')->name('student.showImage');
    Route::resource('studentsubject', 'StudentSubjectController');
    Route::get('student/account/{id}', 'StudentController@setAccount')->name('student.setAccount');
    Route::post('student/account/update/{id}', 'StudentController@updateAccount')->name('student.updateAccount');
    Route::get('register/subject/{id}', 'StudentSubjectController@registerSubject')->name('studentsubject.registerSubject');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');

});
Route::get('setPermission/{id}', 'RoleController@setPermission')->name('roles.setPermission');
Route::post('addPermission/{id}', 'RoleController@addPermission')->name('roles.addPermission');
Route::get('callback/{provider}', 'Auth\LoginController@handleProviderCallback');
Route::get('login/{provider}', 'Auth\LoginController@redirect');
Route::post('student/subjects/update/{id}', 'StudentSubjectController@insertRegisteredSubjects')->name('studentsubject.insertRegisteredSubjects');

Route::get('chat','ChatController@chat')->name('chat');
Route::post('send', 'ChatController@send')->name('chat.send');

Route::get('check', function() {
    return session('chat');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getOldMessage', 'ChatController@getOldMessage')->name('chat.getOldMessage');
Route::post('/deleteSession', 'ChatController@deleteSession')->name('chat.deleteSession');
Route::post('/saveToSession', 'ChatController@saveToSession')->name('chat.saveToSession');
Auth::routes();
//Broadcast::routes();


