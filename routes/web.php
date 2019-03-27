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

Auth::routes(['verify' => true]);

Route::get('verified', function() {
    return '本登録が完了しています。';
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/list', 'Admin\ProfileController@list');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('diary/list', 'Admin\DiaryController@list');
    Route::get('diary/create', 'Admin\DiaryController@add');
    Route::post('diary/create', 'Admin\DiaryController@create');
    Route::get('diary/edit', 'Admin\DiaryController@edit');
    Route::post('diary/edit', 'Admin\DiaryController@update');
    Route::get('diary/delete', 'Admin\DiaryController@delete');
    Route::get('analysis/list', 'Admin\AnalysisController@list');
    Route::get('analysis/create', 'Admin\AnalysisController@add');
    Route::post('analysis/create', 'Admin\AnalysisController@create');
    Route::get('analysis/edit', 'Admin\AnalysisController@edit');
    Route::post('analysis/edit','Admin\AnalysisController@update');
    Route::get('analysis/delete', 'Admin\AnalysisController@delete');
    Route::get('portfolio/list', 'Admin\PortfolioController@list');
    Route::get('other/list', 'Admin\OtherQuestionController@list');
    Route::get('other/create', 'Admin\OtherQuestionController@add');
    Route::post('other/create', 'Admin\OtherQuestionController@create');
    Route::get('other/edit', 'Admin\OtherQuestionController@edit');
    Route::post('other/edit','Admin\OtherQuestionController@update');
    Route::get('other/delete', 'Admin\OtherQuestionController@delete');
    Route::get('timeline/index', 'Admin\OtherQuestionController@index');
    Route::get('timeline/show', 'Admin\OtherAnswerController@show');
    Route::get('timeline/create', 'Admin\OtherAnswerController@add');
    Route::post('timeline/create', 'Admin\OtherAnswerController@create');
    Route::get('timeline/edit', 'Admin\OtherAnswerController@edit');
    Route::post('timeline/edit', 'Admin\OtherAnswerController@update');
    Route::get('timeline/delete', 'Admin\OtherAnswerController@delete')
});
