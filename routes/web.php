<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function(){
    Route::resource('/scraps', 'ScrapsController');
    Route::get('search-emails', 'ScrapsController@searchEmails')->name('searchEmails');
});

Route::get('scrap/{id}', 'ScrapsController@show')->name('scrap')->withoutMiddleware('auth');