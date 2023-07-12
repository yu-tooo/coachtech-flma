<?php

use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Owner\RegisteredUserController;
use App\Http\Controllers\Owner\AuthenticatedSessionController;
use App\Http\Controllers\Owner\ItemController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:owners')->group(function () {
  Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
  Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth:owners')->group(function() {
  Route::get('/', [UserController::class, 'index'])
    ->name('home');
    
  Route::get('detail/{user_id}', [UserController::class, 'detail'])
    ->name('user');

  Route::get('/item', [ItemController::class, 'index'])
    ->name('items');

  Route::get('item/detail/{item_id}', [ItemController::class, 'detail'])
    ->name('item_detail');

  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
      ->name('logout');
  });
  
Route::middleware('auth:admin')->group(function() {
  Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
  Route::post('register', [RegisteredUserController::class, 'store']);
});