<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;

Route::group(['prefix'  =>  'admin'], function () {

Route::get('login', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class,'login'])->name('admin.login.post');
Route::get('logout', [LoginController::class,'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

});

Route::get('settings', [SettingController::class,'index'])->name('admin.settings');
Route::post('settings', [SettingController::class,'update'])->name('admin.settings.update');

});
