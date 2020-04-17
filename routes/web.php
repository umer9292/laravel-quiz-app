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

Route::get('/', [
    'as' => 'frontend',
    'uses' => 'FrontendController@index'
]);

Auth::routes();

Route::group(['prefix' => 'student', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [
        'as' => 'student.dashboard',
        'uses' => 'HomeController@index'
    ]);

    Route::get('/takequiz/{quiz}', [
        'as' => 'take.quiz',
        'uses' => 'HomeController@takeQuiz'
    ]);

    Route::get('/show/{quiz}/{question}', [
        'as' => 'show.questions',
        'uses' => 'HomeController@showQuestions'
    ]);

    Route::post('/store/{question}', [
        'as' => 'store.answer',
        'uses' => 'HomeController@storeAnswer'
    ]);

    Route::get('/result/{quiz}', [
        'as' => 'quiz.result',
        'uses' => 'HomeController@quizResult'
    ]);

    Route::get('/export-excel/{quiz}', [
        'as' => 'quiz.export.excel',
        'uses' => 'HomeController@export'
    ]);

    Route::get('/export-pdf/{quiz}', [
        'as' => 'quiz.export.pdf',
        'uses' => 'HomeController@createPdf'
    ]);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'AdminController@dashboard',
    ]);


    Route::resource('quiz', 'QuizController');
    Route::resource('question', 'QuestionController');

});
