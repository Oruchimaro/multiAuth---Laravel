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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout' , 'Auth\LoginController@userLogout')->name('user.logout'); //custom logout for users

Route::prefix('admin')->group(function()
{
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login'); //gets the login form for admin
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit'); //post route for submiting the admin login form
    Route::get('/', 'AdminController@index')->name('admin.dashboard');  //admin dashboard route
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout'); //logout from admin 
});

