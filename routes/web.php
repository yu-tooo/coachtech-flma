<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [UserController::class, 'login'])
->name('user.login');
Route::get('/register', [UserController::class, 'register'])
->name('user.register');

Route::get('/purchase/address', [UserController::class, 'address'])
->name('user.address');

Route::get('/sell', [UserController::class, 'sell'])
->name('user.sell');

Route::get('/mypage/profile', [UserController::class, 'profile'])
->name('user.profile');

Route::get('/purchase', [UserController::class, 'purchase'])
->name('user.purchase');

Route::get('/item', [UserController::class, 'item'])
->name('user.item');

Route::get('/item/comment', [UserController::class, 'comment'])
->name('user.comment');

Route::get('/mypage', [UserController::class, 'mypage'])
->name('user.mypage');

Route::get('/', [UserController::class, 'index'])
->name('user.home');
// Route::get/('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
