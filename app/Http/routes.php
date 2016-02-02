<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {


});

Route::resource('trainings', 'TrainingController');
Route::resource('trainings.attendees', 'AttendeeController');

// Frontend Routes
Route::get('/', 'DashboardController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('exam', 'ExamController@index');
Route::get('feedback', 'FeedbackController@index');


