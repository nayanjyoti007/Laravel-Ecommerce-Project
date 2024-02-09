<?php

use App\Http\Controllers\FrontEnd\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
