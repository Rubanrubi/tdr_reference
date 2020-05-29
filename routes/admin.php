<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Route::namespace('admin')->name('admin.')->group(function () {

    Route::middleware(['web'])->group(function () {
        Route::get('login', 'AdminAuthController@getLogin')->name('login');
        Route::post('login', 'AdminAuthController@postLogin')->name('login');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::post('password/reset', 'ResetPasswordController@reset');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    });

    Route::middleware(['web','admin:admin'])->group(function () {

        Route::get('otp', 'AdminAuthController@getOtp')->name('otp');
        Route::post('2fa', 'AdminAuthController@postValidateToken')->name('2fa');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('settings', 'SettingsController@index')->name('settings');
        Route::post('update-password', 'SettingsController@postUpdatePassword');
        Route::post('update-email', 'SettingsController@postUpdateEmail')->name('update-email');
        Route::post('googletwofactor', 'SettingsController@googleTwoFactorUpdate')->name('googletwofactor');
        Route::post('update-fax', 'SettingsController@postUpdateFax')->name('update-fax');
        Route::get('unauthorised', 'AdminAuthController@unauthorisedPage');

        Route::get('document/list', 'DocumentMasterController@index')->name('document.list');
        Route::post('document/add', 'DocumentMasterController@store')->name('document.add');
        Route::post('document/update', 'DocumentMasterController@update')->name('document.update');
        Route::post('document/delete', 'DocumentMasterController@delete')->name('document.delete');

        Route::get('notifier/list', 'NotifierController@index')->name('notifier.list');
        Route::get('notifier/notifier-list', 'NotifierController@notifierList')->name('notifier.notifier-list');
        Route::get('notifier/add', 'NotifierController@add')->name('notifier.add');
        Route::get('notifier/edit/{id}', 'NotifierController@edit')->name('notifier.edit');
        Route::post('notifier/update-status', 'NotifierController@updateStatus')->name('notifier.update-status');
        Route::post('notifier/store', 'NotifierController@store')->name('notifier.store');
        Route::post('notifier/update', 'NotifierController@update')->name('notifier.update');
        Route::post('notifier/update-password', 'NotifierController@updatePassword')->name('notifier.update-password');

        Route::get('cod/list', 'CauseOfDeathController@index')->name('cod.list');
        Route::get('cod/causeofdeath-list', 'CauseOfDeathController@causeOfDeathlist')->name('cod.causeofdeath-list');
        Route::post('cod/add', 'CauseOfDeathController@store')->name('cod.add');
        Route::post('cod/update', 'CauseOfDeathController@update')->name('cod.update');
        Route::post('cod/delete', 'CauseOfDeathController@delete')->name('cod.delete');

        Route::get('creditor/list/{type}', 'CreditorController@index');
        Route::get('creditor/creditor-list', 'CreditorController@creditorList');
        Route::get('creditor/view-creditor/{id}', 'CreditorController@detailView');
        Route::get('creditor/reject/{id}', 'CreditorController@reject');
        Route::get('creditor/approve/{id}', 'CreditorController@approve');
        Route::post('creditor/approve', 'CreditorController@updateApprove');
        Route::get('creditor/send-credentials/{id}', 'CreditorController@sendCredentials');

        Route::get('email-template/list', 'SettingsController@emailTemplateList')->name('email-template.list');
        Route::post('email-template/update', 'SettingsController@emailTemplateUpdate')->name('email-template.update');
        Route::get('email-template/edit/{id}', 'SettingsController@emailTemplateEdit');

        Route::get('subadmin/list', 'SubadminController@index')->name('subadmin.list');
        Route::get('subadmin/subadmin-list', 'SubadminController@subadminList')->name('subadmin.subadmin-list');
        Route::get('subadmin/add', 'SubadminController@add')->name('subadmin.add');
        Route::get('subadmin/edit/{id}', 'SubadminController@edit')->name('subadmin.edit');
        Route::post('subadmin/update-status', 'SubadminController@updateStatus')->name('subadmin.update-status');
        Route::post('subadmin/store', 'SubadminController@store')->name('subadmin.store');
        Route::post('subadmin/update', 'SubadminController@update')->name('subadmin.update');

        Route::get('user-type/list', 'UserTypeController@index')->name('user-type.list');
        Route::get('user-type/add', 'UserTypeController@add')->name('user-type.add');
        Route::get('user-type/edit/{id}', 'UserTypeController@edit')->name('user-type.edit');
        Route::post('user-type/update-status', 'UserTypeController@updateStatus')->name('user-type.update-status');
        Route::post('user-type/store', 'UserTypeController@store')->name('user-type.store');
        Route::post('user-type/update', 'UserTypeController@update')->name('user-type.update');

        Route::get('logout', 'AdminAuthController@postLogout')->name('logout');
    });
});
