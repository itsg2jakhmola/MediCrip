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

/*Route::get('test', function(){
    $mail = Mail::send('auth.emails.test', ['user' => "Sachin"], function ($message) {
            $message->from('notification@feastby.com', 'Feastby');
            $message->to("sachintendulkar3@yopmail.com", "sachin")->subject('MedCrip | Request Email test');
        });
});*/

// Display all SQL executed in Eloquent
/*Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/welcome', 'Admin\DashboardController@index');
    Route::get('/user', 'Admin\UserController@index');
    //Route::get('/apppoinment', 'Admin\AppoinmentController@index');
    Route::get('/prescription', 'Admin\PrescriptionController@index');
    Route::resource('medical_history', 'Admin\MedicalHistoryController');
    Route::resource('appointment_setting', 'Admin\MyAppointmentController');
    Route::resource('docappoint_setting', 'Admin\DoctorAppointmentController');
    Route::get('/review', 'Admin\ReviewController@index');
    Route::get('/cancelation_list', 'Admin\CancelationListController@index');
    Route::get('/add_prscriptions', 'Admin\AddPrescriptionController@index');
    Route::get('/appoinment_reminder', 'Admin\ApppoinmentReminderController@index');
    
    Route::post('user/update/{user_id}', ['uses' =>'Admin\UserController@update', 'as' => 'admin.user.update']);
});


Route::group(['prefix' => '/api', 'namespace' => 'Api', 'middleware' => 'auth'], function () {
  // Notifications
  Route::get('user/notify', 'NotificationController@index');
  Route::get('user/notifications', 'NotificationController@getMessages');
  Route::post('user/shownotifications', 'NotificationController@showMessages');
  Route::post('user/readnotification', 'NotificationController@readMessage');

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

    /*Route::get('/welcome', function () {
        return view('welcome');
    });*/

});

//Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/admins', function(){
        return view('admin.index');
    });