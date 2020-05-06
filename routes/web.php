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

use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/redirct/{service}' , 'socialController@redirct');
Route::get('/callback/{service}' , 'socialController@callback');

Route::group(['prefix' => 'offer'], function () {
    Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
        Route::get('create','CrudController@create');
    });
    Route::post('store','CrudController@store')->name('offer.store');


});
