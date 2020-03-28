<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::any('/errors', 'PollController@errors');

Route::prefix('/v1/polls')->group(function() {
    Route::get('/', 'PollController@index')->name('polls');
    Route::post('/', 'PollController@store');
    
    Route::prefix('/{id}')->group(function() {
        Route::get('/', 'PollController@show')->name('polls.item');
    });
    
    Route::prefix('/{poll}')->group(function() {
        Route::get('/questions', 'PollController@questions');
        Route::put('/', 'PollController@update');
        Route::delete('/', 'PollController@delete');
    });
	
});

Route::prefix('/v1/questions')->group(function() {
    Route::get('/', 'QuestionController@index')->name('questions');
    Route::post('/', 'QuestionController@store');
    
    Route::prefix('/{id}')->group(function() {
        Route::get('/', 'QuestionController@show')->name('questions.item');
    });
    
    Route::prefix('/{question}')->group(function() {
        Route::put('/', 'QuestionController@update');
        Route::delete('/', 'QuestionController@delete');
    });
	
});

Route::get('/files/get', 'FilesController@show');
Route::post('/files/create', 'FilesController@create');
