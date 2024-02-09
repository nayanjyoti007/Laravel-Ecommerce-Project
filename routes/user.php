<?php

use App\Http\Controllers\FrontEnd\User\DashboardController;
use App\Http\Controllers\FrontEnd\User\LoginController;
use App\Http\Controllers\FrontEnd\User\ProfileController;
use App\Http\Controllers\FrontEnd\User\RegisterController;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'User'], function () {


    Route::get('/register', [RegisterController::class, 'register'])->name('user.register');
    Route::post('/register-submit', [RegisterController::class, 'registerSubmit'])->name('user.register.submit');
    Route::get('/login', [LoginController::class, 'login'])->name('user.login');
    Route::post('/login-submit', [LoginController::class, 'loginSubmit'])->name('user.login.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');





    Route::group(['middleware' => 'auth:web', 'as' => 'user.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('/', [ProfileController::class, 'profile']);
            Route::post('/update', [ProfileController::class, 'update'])->name('update');
            Route::any('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
        });

    });

});
