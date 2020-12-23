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

Route::get('/', 'Controller@showIndex');
Route::get('/login', 'Auth\LoginController@showLoginForm' )->name('loginForm');
Route::post('/login', 'Auth\LoginController@memberLogin')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('registrationForm');
Route::post('/register', 'Auth\RegisterController@registerProcess')->name('register');
