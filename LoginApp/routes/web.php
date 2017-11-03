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
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('login','UserController@login')->name('login');

Route::post('register','UserController@register')->name('register');

Route::get('reset_password','UserController@reset_password_view');

Route::post('reset_password','UserController@reset_password')->name('reset_password');

Route::get('/home', 'HomeController@index')->name('home');
