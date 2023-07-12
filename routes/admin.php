<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:admin')->group(function () {
  Route::get('login', [AuthenticatedSessionController::class, 'create'])
  ->name('login');
  
  Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {
  Route::get('/', [UserController::class, 'index'])
  ->name('home');
  
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');
});


