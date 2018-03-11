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

use App\Events\Messages;

Route::get('/', function () {
\App\Events\TestEvent::dispatch();
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('company','CompanyController');
Route::resource('session', 'SessionController');
Route::resource('subject', 'SubjectController');
Route::post('subject/{sessionID}', 'SubjectController@store')->name('subject.store');
Route::get('subject/show/{subjectID}/{sessionID}', 'SubjectController@show')->name('subject.show');
Route::post('subject/update/{subjectID}/{sessionID}', 'SubjectController@update')->name('subject.update');
Route::get('session/menu/{lastID}/{sessionID}', 'SubjectController@menu')->name('session.menu');
Route::get('session/showsession/{sessionID}' ,'SessionController@showsession')->name('session.showsession');
Route::get('ajaxsubject/{id}/{checked}', 'SubjectController@ajax_checked');
Route::get('chat', 'ChatController@chat')->name('chat');
Route::post('send', 'ChatController@send');
