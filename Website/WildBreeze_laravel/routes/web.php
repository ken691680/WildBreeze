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
Route::get('member/login', 'Auth\LoginController@showLoginForm' )->name('loginForm');
Route::post('/login', 'Auth\LoginController@memberLogin')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/member/log', 'MemberController@showMemberLog')->name('member.log');
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
Route::get('/shop', 'ShopController@showShop');
Route::get('/shop/catalog', 'ShopController@showShopCatalog');
Route::get('/shop/intro', 'ShopController@showShopIntro');
Route::get('/shop/hot', 'ShopController@showShopHot');
Route::get('/cart', 'CartController@showCart');
Route::get('/cart/atm', 'CartController@showCartAtm');
Route::get('/cart/card', 'CartController@showCartCard');
Route::get('/cart/card/confirm', 'CartController@showCartCardConfirm');
Route::get('/cart/atm/confirm', 'CartController@showCartAtmConfirm');
Route::get('/cart/step', 'CartController@showCartStep');
Route::get('/cart/complete', 'CartController@showCartComplete');
Route::post('/area', 'ajax\MemberController@showArea');
Route::post('/member_data_modify', 'ajax\MemberController@memberDataModify');
