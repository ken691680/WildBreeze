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

Route::get('/', 'IndexController@showIndex');
Route::get('/login', 'Auth\LoginController@showLoginForm' )->name('loginForm');
Route::post('/login', 'Auth\LoginController@memberLogin')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('registrationForm');
Route::post('/register', 'Auth\RegisterController@registerProcess')->name('register');
Route::get('/forget_password', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::get('/about', 'CompanyController@showAbout');
Route::get('/news/list', 'NewsController@showNewsList');
Route::get('/news/info/{id}', 'NewsController@showNewsInfo');
Route::get('/event/list', 'EventController@showEventList');
Route::get('/event/info/{id}', 'EventController@showEventInfo');
Route::get('/spot/list', 'SpotController@showSpotList');
Route::get('/spot/info/{id}', 'SpotController@showSpotInfo');
