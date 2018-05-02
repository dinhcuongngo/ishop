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

//======USERS
Route::get('/signup', 'User\CommonUserController@viewSignup')->name('signup');
Route::post('/signup', 'User\CommonUserController@signUp');
Route::resource('users','User\UserController',['except'=>['create','edit']]);
