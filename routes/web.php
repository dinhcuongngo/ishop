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
})->name('welcome');
Route::get('/home',function(){
	return view('home');
})->middleware('auth');

//======USERS======\\
Route::resource('users','User\UserController',['except'=>['create','edit']])->middleware('admin');

//-----------------Signup
Route::get('signup', 'User\CommonUserController@viewSignup')->name('signup');
Route::post('signup', 'User\CommonUserController@signUp');

//-----------------Signin & Logout
Route::get('signin', 'User\CommonUserController@viewSignin')->name('login');
Route::post('signin', 'User\CommonUserController@signIn');
Route::get('logout', 'User\CommonUserController@logOut');

//-----------------Change Password 
Route::get('users/{id}/change', 'User\UserController@viewChangePassword');
Route::put('users/{id}/change', 'User\UserController@changePassword');

//======CATEGORY======\\
Route::resource('categories','Category\CategoryController',['except'=>['create','edit']]);

//======SHOP======\\
Route::resource('shops','Shop\ShopController',['except'=>['create','edit']]);
