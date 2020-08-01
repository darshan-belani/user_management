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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/admin/index', 'admin.index');
Route::view('/admin/signin', 'admin.signin');
Route::view('/admin/form', 'admin.form');

Route::view('/signup', 'register');
Route::any('/regist', 'UserController@store');
Route::any('/signin', 'UserController@signIn');
Route::any('/logdata', 'UserController@log');

Route::group(['middleware' => ['login']], function () {
    Route::any('/allUser', 'UserController@index');
    Route::any('/allUser/getAll', 'UserController@getAll');
    Route::any('/edit/{id}', 'UserController@edit');
    Route::any('/update/{id}', 'UserController@update');
    Route::any('/delete/{id}', 'UserController@destroy');
    Route::view('/addUser', 'addUser')->name('addUser');
    Route::any('/add', 'UserController@adduser');
    //Reset Password
    Route::view('/rst', 'rst');
    Route::any('/emailVrf', 'UserController@emailVerification');
    Route::view('/otp', 'otp');
    Route::any('/otpVrf', 'UserController@otpVerification');
    Route::any('/updPswd', 'UserController@updatePassword');

    Route::any('/logout', 'UserController@logout');
});
