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

Route::get('/', function () {
    return view('homepage');
});


Route::group(['middlewareGroups' => 'web', 'namespace' => 'Auth'], function () {
    Route::get('/login', 'AuthController@showLoginForm');
    Route::get('/logout', 'AuthController@logout');
    Route::post('/password/email', 'PasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'PasswordController@reset');
    Route::get('/password/reset/{token?}', 'PasswordController@showResetForm');
    Route::get('/register', 'AuthController@showRegistrationForm');
    Route::post('/register/patient', 'AuthController@register');
    Route::post('/register/doctor', 'AuthController@register');
    Route::post('/register/pharmacy', 'AuthController@register');
    Route::post('/login/', 'LoginController@login');

    Route::get('/welcome', function () {
        return view('welcome');
    });

});

//Route::auth();

Route::get('/home', 'HomeController@index');
