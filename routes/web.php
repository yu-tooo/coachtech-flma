<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\RegisteredUserController;
use App\Http\Controllers\User\AuthenticatedSessionController;
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

Route::get('/', [UserController::class, 'index'])
->name('home');

Route::get('/item', [UserController::class, 'item'])
->name('item');


Route::middleware('guest:users')->group(function () {
  Route::get('register', [RegisteredUserController::class, 'create'])
  ->name('register');

  Route::post('register', [RegisteredUserController::class, 'store']);

  Route::get('login', [AuthenticatedSessionController::class, 'create'])
  ->name('login');

  Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth:users')->group(function () {
  Route::get('/item/comment', [UserController::class, 'comment'])
  ->name('comment');

  Route::get('/purchase', [UserController::class, 'purchase'])
  ->name('purchase');

  Route::get('/purchase/address', [UserController::class, 'address'])
  ->name('address');

  Route::get('/sell', [UserController::class, 'sell'])
  ->name('sell');

  Route::get('/mypage', [UserController::class, 'mypage'])
  ->name('mypage');

  Route::get('/mypage/profile', [UserController::class, 'profile'])
  ->name('profile');

  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');
});


