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
Auth::routes();

Route::middleware('auth')->group(function () {

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/app', 'HomeController@index')->name('home');
Route::group(['prefix' => 'app'], function () {

Route::resource('hives', 'HivesController');
Route::post('hives/store', 'HivesController@store');
Route::get('hives/delete/{id}', 'HivesController@destroy');

Route::resource('apiaries', 'ApiariesController');
Route::post('apiaries/store', 'ApiariesController@store');
Route::get('apiaries/delete/{id}', 'ApiariesController@destroy');

Route::resource('colonies', 'ColoniesController');
Route::post('colonies/store', 'ColoniesController@store');
Route::get('colonies/delete/{id}', 'ColoniesController@destroy');
});


});