<?php

use Illuminate\Support\Facades\Auth;
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

Route::view('/', 'welcome');
    Auth::routes();



    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

    Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('login.admin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

    Route::view('/home', 'home')->middleware('auth');


    Route::view('/admin', 'admin');




    Route::group(['middleware' => ['web','auth:admin'], 'prefix' => 'admin'], function() {
        Route::get('user/register', 'UserRegistrationController@index')->name('register');
        Route::post('/register', 'UserRegistrationController@createUser')->name('user.register');
        Route::get('user/list', 'UserRegistrationController@showUsers')->name('users.list');

        Route::get('user/details/{id}', 'UserRegistrationController@userDetails');
        Route::get('user/edit/{id}', 'UserRegistrationController@editUsers');

        Route::post('user/edit/{id}', 'UserRegistrationController@editUpadte')->name('user.edit');

        Route::delete('/user/delete/{id}', 'UserRegistrationController@destroy');



      });
