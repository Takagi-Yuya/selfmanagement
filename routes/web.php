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
    Route::get('analysis/list', 'Admin\AnalysisController@list');
    Route::get('portfolio/list', 'Admin\PortfolioController@list');
    Route::get('other/list', 'Admin\OtherController@list');
});
