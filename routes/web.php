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

Route::middleware('guest:users')->group(function () {
  Route::get('register', [RegisteredUserController::class, 'create'])
  ->name('register');

  Route::post('register', [RegisteredUserController::class, 'store']);

  Route::get('login', [AuthenticatedSessionController::class, 'create'])
  ->name('login');

  Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth:users')->group(function () {
  Route::get('/item/comment/{item_id}', [CommentController::class, 'index'])
  ->name('comment');

  Route::post('/item/comment/{item_id}', [CommentController::class, 'create']);
  
  Route::post('/item/like/{item_id}', [LikeController::class, 'create'])
  ->name('like');

  Route::post('/item/unlike/{item_id}', [LikeController::class, 'destroy'])
  ->name('unlike');

  Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'address'])
  ->name('address');

  Route::post('/purchase/address/{item_id}', [PurchaseController::class, 'updateAddress']);

  Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])
  ->name('purchase');

  Route::post('/purchase/{item_id}', [PurchaseController::class, 'purchase']);

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

Route::get('/', [ItemController::class, 'index'])
  ->name('home');

Route::get('/item/{item_id}', [ItemController::class, 'detail'])
  ->name('item');