<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// 简写形式
// get('/','StaticPagesController@home');
// get('/help','StaticPagesController@help');
// get('/about','StaticPagesController@about');
// 传递了两个参数，第一个指明了URL，第二个参数指明了处理该URL的控制器动作
Route::get('/','StaticPagesController@home')->name('home');
Route::get('/help','StaticPagesController@help')->name('help');
Route::get('/about','StaticPagesController@about')->name('about');

get('signup' , 'UsersController@create')->name('signup');
resource('users' , 'UsersController');

/* 增加三个方法，针对用户登录和退出*/
get('login', 'SessionsController@create')->name('login');
post('login', 'SessionsController@store')->name('login');
delete('logout', 'SessionsController@destroy')->name('logout');

get('signup/confirm/{token}' , 'UsersController@confirmEmail')->name('confirm_email');