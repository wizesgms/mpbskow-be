<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function () {
        Route::get('/', 'showLoginForm')->name('login');
        Route::post('doLogin', 'login')->name('doLogin');
        Route::get('logout', 'logout')->name('logout');
    });
});

Route::middleware(['admin'])->group( function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('profile','ProfileController@index')->name('profile');
    Route::post('profile/update','ProfileController@update')->name('profile.update');

    Route::get('members','MemberController@index')->name('members.list');
    Route::get('members/{extplayer}/details','MemberController@details')->name('members.list.details');
    Route::post('members/{id}/update','MemberController@update')->name('members.list.update');
    Route::post('members/{extplayer}/bank','MemberController@banks')->name('members.list.bank');
    Route::get('members/balance','MemberController@balance')->name('members.balance');
    Route::post('members/balance/add','MemberController@balanceup')->name('members.balance.update');

    Route::get('deposits/pending','DepositController@index')->name('deposits.pending');
    Route::get('deposits/transaction','DepositController@list')->name('deposits.list');
    Route::get('deposits/{id}/approve','DepositController@approve')->name('deposits.approve');
    Route::get('deposits/{id}/reject','DepositController@reject')->name('deposits.reject');

    Route::get('banks/account','BankController@index')->name('bank.list');
    Route::get('banks/{id}/edit','BankController@edit')->name('bank.edit');

    Route::post('banks/create','BankController@create')->name('bank.create');
    Route::post('banks/{id}/update','BankController@update')->name('bank.update');
    Route::get('banks/{id}/delete','BankController@delete')->name('bank.delete');

    Route::get('settings/website','SettingController@index')->name('settings');
    Route::post('settings/website/update','SettingController@update')->name('settings.update');

    Route::get('settings/promotion','PromotionController@index')->name('website.promotion');
    Route::get('settings/promotion/{id}/edit','PromotionController@edit')->name('website.promotion.edit');

    Route::get('settings/promotion-deposit','PromotionController@deposit')->name('website.deposit');
    Route::get('settings/promotion-deposit/{id}/edit','PromotionController@editd')->name('website.deposit.edit');

    Route::post('settings/promotion/{id}/update','PromotionController@update')->name('website.promotion.update');
    Route::post('settings/promotion/create','PromotionController@create')->name('website.promotion.create');
    Route::get('settings/promotion/{id}/delete','PromotionController@delete')->name('website.promotion.delete');

    Route::get('settings/banner','PromotionController@banner')->name('website.banner');
    Route::post('settings/banner/create','PromotionController@bcreate')->name('website.banner.create');
    Route::get('settings/banner/{id}/delete','PromotionController@bdelete')->name('website.banner.delete');

    Route::get('settings/floating','PromotionController@float')->name('website.floating');
    Route::get('settings/floating/{id}/edit','PromotionController@floatedit')->name('website.floating.edit');
    Route::post('settings/floating/{id}/update','PromotionController@floatupdate')->name('website.floating.update');
    Route::post('settings/floating/create','PromotionController@floatcreate')->name('website.floating.create');
    Route::post('settings/popup/update','PromotionController@popup')->name('website.floating.popup');
    Route::get('settings/floating/{id}/delete','PromotionController@floatdelete')->name('website.floating.delete');

    Route::get('settings/api/setting','ProviderController@index')->name('website.api');
    Route::post('settings/api/edit/{id}','ProviderController@edit')->name('website.api.update');
    Route::get('settings/api/use/{id}','ProviderController@use')->name('website.api.use');

    Route::get('admin/app/list','AdminController@index')->name('admin.list');
    Route::get('admin/app/edit/{id}','AdminController@edit')->name('admin.list.edit');
    Route::post('admin/app/create','AdminController@create')->name('admin.list.create');
    Route::post('admin/app/update/{id}','AdminController@update')->name('admin.list.update');
    Route::get('admin/app/delete/{id}','AdminController@delete')->name('admin.list.delete');

    Route::get('withdrawal/pending','WithdrawController@index')->name('withdrawal.pending');
    Route::get('withdrawal/transaction','WithdrawController@list')->name('withdrawal.list');
    Route::get('withdrawal/{id}/approve','WithdrawController@approve')->name('withdrawal.approve');
    Route::get('withdrawal/{id}/reject','WithdrawController@reject')->name('withdrawal.reject');

    Route::get('admin/app/notification','AdminController@getNotif')->name('getNotif');
    Route::get('admin/app/notifications','AdminController@getNotifwd')->name('getNotif2');

});
