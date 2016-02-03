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

    Route::group(['prefix' => 'backend'], function() {
        Route::group(['middleware' => ['auth']], function () {

            // Training + Trainingattendees
            Route::resource('trainings', 'TrainingController');
            Route::resource('trainings.exams', 'TrainingExamController');
            Route::resource('trainings.exams.attendees', 'ExamAttendeeController', ['except' => ['update', 'edit']]);
            Route::resource('trainings.exams.attendees.questions', 'ExamQuestionController');
            Route::resource('trainings.exams.attendees.questions.answers', 'ExamAnswerController');

            // Question catalog
            Route::resource('trainings.questions', 'QuestionController');
            Route::resource('trainings.questions.answers', 'AnswerController');

            // Attendees
            Route::resource('attendees', 'AttendeeController');

            // Home Routes
            Route::get('/', 'DashboardController@index');
            Route::get('dashboard', 'DashboardController@index');
        });

        // Authentication routes
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');

        // Registration routes
        Route::get('register', 'Auth\AuthController@getRegister');
        Route::post('register', 'Auth\AuthController@postRegister');

        // password forgotten route
        Route::get('password/email', 'Auth\PasswordController@getEmail');
    });

    // attendee frontend
    Route::get('/', 'ExamController@index');
    Route::get('/', ['as' => 'exam', 'uses' => 'ExamController@index']);

    // feedback
    Route::get('feedback', 'FeedbackController@index');

    // attendee login
    Route::get('login', ['as' => 'examLogin', 'uses' => 'ExamController@login']);
    Route::get('logout', ['as' => 'examLogout', 'uses' => 'ExamController@logout']);
    Route::post('login', ['as' => 'examLoginCheck', 'uses' => 'ExamController@loginCheck']);

});
