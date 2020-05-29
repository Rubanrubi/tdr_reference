<?php

/*
|--------------------------------------------------------------------------
| Creditor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register creditor routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "creditor" middleware group. Now create something great!
|
*/


Route::namespace('Creditor')->name('creditor.')->group(function () {
    
    Route::group(['middleware' => 'web'], function () {
        Route::get('login', 'AuthController@getLogin')->name('login');
        Route::post('login', 'AuthController@postLogin')->name('login');
        Route::get('register', 'AuthController@getRegister')->name('register');
        Route::post('register', 'AuthController@postRegister')->name('register');
        Route::get('welcome', 'AuthController@welcome')->name('welcome');
        Route::get('email/verify/{token}/{creditor_id}', 'AuthController@emailVerification')->name('email.verify');

        Route::get('dashboard', 'DashboardController@getDashboard')->name('dashboard');
        Route::get('queue-data', 'DashboardController@queueData')->name('queue-data');
        Route::get('search', 'SearchController@search')->name('search');
        Route::get('detailed-report', 'SearchController@detailedReport')->name('detailed-report');
        Route::get('view-detail', 'SearchController@departed')->name('view-detail');
        Route::get('member', 'MemberController@member')->name('member');
        



        Route::get('logout', 'AuthController@postLogout')->name('logout');
    });
 
});
