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




Route::get('/', 'HomeController@signin');

Route::get('/signin', 'HomeController@signin')->name('signin');;
Route::get('/signup', 'HomeController@signup');
Route::get('/signup/pendaki', 'HomeController@signupPendaki');
Route::get('/signup/pemandu', 'HomeController@signupPemandu');

Route::get('/auth/signout', 'AuthController@signout');

Route::post('/auth/signin', [
    'middleware' => 'signin',
    'uses' => 'AuthController@signin'
]);

Route::post('/auth/signup', [
    'middleware' => 'signup',
    'uses' => 'AuthController@signup'
]);


$router->group(['middleware' => ['session']], function () use ($router) {
    Route::get('/dashboard', 'HomeController@dashboard');
    Route::get('/profile', 'UserController@index');
    Route::get('/profile/ubah', 'UserController@ubah');
    Route::get('/profile/password/ubah', 'UserController@ubah_password');


    Route::get('/pemanduan/pendaki/{id_pendaki}', 'UserController@pendaki');
    Route::get('/pemanduan', 'PemanduanController@index');


    Route::get('/pendakian/{id_pendakian}/bayar', 'PendakianController@bayar');
    Route::get('/pendakian/{id_pendakian}', 'PendakianController@detail');
    Route::get('/pendakian/gunung/all', 'PendakianController@list_gunung');
    Route::get('/pendakian/gunung/{id_gunung}', 'PendakianController@gunung');
    Route::get('/pendakian/pemandu/all', 'PendakianController@list_pemandu');
    Route::get('/pendakian/pemandu/{id_pemandu}', 'UserController@pemandu');
    Route::get('/pendakian', 'PendakianController@index');

    Route::post('/pendakian/store', [
        'middleware' => 'pendakianstore',
        'uses' => 'PendakianController@store'
    ]);

    Route::post('/pemanduan/store', [
        'middleware' => 'pemanduanstore',
        'uses' => 'PemanduanController@store'
    ]);

    Route::post('/pemanduan/approve', [
        'middleware' => 'pemanduanapprove',
        'uses' => 'PemanduanController@approve'
    ]);

    Route::post('/pemanduan/approve', [
        'middleware' => 'pemanduanapprove',
        'uses' => 'PemanduanController@approve'
    ]);

    Route::post('/pendakian/pay', [
        'middleware' => 'pendakianpay',
        'uses' => 'PendakianController@pay'
    ]);

    Route::post('/pemanduan/confirmation', [
        'middleware' => 'pemanduanpayconfirmation',
        'uses' => 'PemanduanController@payconfirmation'
    ]);

    Route::post('/pendakian/finish', [
        'middleware' => 'pendakianfinish',
        'uses' => 'PendakianController@finish'
    ]);

    Route::post('/auth/profile', [
        'middleware' => 'updateprofile',
        'uses' => 'AuthController@update'
    ]);

    Route::post('/auth/profile/password', [
        'middleware' => 'updatepassword',
        'uses' => 'AuthController@update_password'
    ]);

    Route::post('/auth/profile/keterangan', [
        'middleware' => 'updateketerangan',
        'uses' => 'AuthController@update_keterangan'
    ]);

    // Route::post('/pendakian/update', 'PendakianController@update');


});


