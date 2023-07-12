<?php

use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Owner\RegisteredUserController;
use App\Http\Controllers\Owner\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:owners')->group(function () {
  Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
  Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth:owners')->group(function() {
  Route::get('/', [UserController::class, 'index'])
    ->name('home');
    
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

  Route::get('detail/{user_id}', [UserController::class, 'detail'])
    ->name('detail');
});

Route::middleware('auth:admin')->group(function() {
  Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
  Route::post('register', [RegisteredUserController::class, 'store']);
});