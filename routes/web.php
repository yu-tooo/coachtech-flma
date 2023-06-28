<?php

use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\LikeController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PurchaseController;
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

Route::get('/', [ItemController::class, 'index'])
->name('home');

Route::get('/item/{id}', [ItemController::class, 'detail'])
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
  Route::post('/item/comment', [CommentController::class, 'comment'])
  ->name('comment');

  Route::post('/item/like', [LikeController::class, 'create'])
  ->name('like');

  Route::post('/item/unlike', [LikeController::class, 'destroy'])
  ->name('unlike');

  Route::get('/purchase', [PurchaseController::class, 'index'])
  ->name('purchase');

  Route::post('/purchase', [PurchaseController::class, 'purchase']);

  Route::get('/purchase/address', [PurchaseController::class, 'address'])
  ->name('address');

  Route::post('/purchase/address', [PurchaseController::class, 'updateAddress']);

  Route::get('/sell', [ItemController::class, 'sellView'])
  ->name('sell');

  Route::post('/sell', [ItemController::class, 'sellCreate']);

  Route::get('/mypage', [UserController::class, 'mypage'])
  ->name('mypage');

  Route::get('/mypage/profile', [UserController::class, 'profile'])
  ->name('profile');

  Route::post('/mypage/profile', [UserController::class, 'updateProfile']);

  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
  ->name('logout');
});


