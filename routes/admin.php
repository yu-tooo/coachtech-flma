<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Owner\ItemController;
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

  Route::get('user/detail/{user_id}', [UserController::class, 'detail'])
  ->name('user');

  Route::get('/item', [ItemController::class, 'index'])
  ->name('items');

  Route::get('item/detail/{item_id}', [ItemController::class, 'detail'])
  ->name('item_detail');

  Route::post('item/delete/{item_id}', [ItemController::class, 'destroy'])
  ->name('item_delete');

  Route::post('item/restore/{item_id}', [ItemController::class, 'restore'])
  ->name('item_restore');
  
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');
});


