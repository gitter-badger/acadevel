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
    Route::resource('trainings', 'TrainingController');
    Route::resource('trainings.attendees', 'AttendeeController');
    Route::resource('trainings.questions', 'QuestionController');
    Route::resource('trainings.questions.answers', 'AnswerController');

    // custom user friendly routes
    Route::get('trainings/{id}/{slug?}', ['as' => 'trainings.show', 'uses' => 'TrainingController@show']);
    Route::get('trainings/{id}/{slug}/edit', ['as' => 'trainings.edit', 'uses' => 'TrainingController@edit']);
    Route::post('trainings/{id}/{slug?}/edit', ['as' => 'trainings.edit', 'uses' => 'TrainingController@edit']);

    // Frontend Routes
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index');
    Route::get('exam', 'ExamController@index');
    Route::get('feedback', 'FeedbackController@index');
});
