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