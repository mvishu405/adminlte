<?php

/*
|--------------------------------------------------------------------------
| Adminlte Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::middleware('web')->group(function () {

    Route::auth();

    Route::get(Adminlte::getAdminUrl('/'), 'AdminController\DashboardController@index')->name('admin');

    Route::get(Adminlte::getAdminUrl('setting'), 'AdminController\SettingController@showSetting')->name('admin.setting');

    Route::post(Adminlte::getAdminUrl('storeSetting'), 'AdminController\SettingController@storeSetting')->name('admin.store.setting');

});