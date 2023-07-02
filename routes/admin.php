<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RegisteredUserController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
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

Route::get('/', [AdminController::class, 'index'])->middleware('auth:admin');


Route::middleware('guest:admin')->group(function () {
  Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

  Route::post('register', [RegisteredUserController::class, 'store']);

  Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

  Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout')->middleware('auth:admin');
