<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SendOrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;



Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/filter', [HomeController::class, 'filter'])->name('applyFilter');


Route::get('/store/{id}', [StoresController::class, 'show'])->name('showStore');
Route::get('/seller/store/create', [StoresController::class, 'create'])->name('createStore')->middleware('auth');
Route::post('/seller/store/create', [StoresController::class, 'save'])->middleware('auth');
Route::get('/store/edit', [StoresController::class, 'edit'])->name('editStore')->middleware('auth');
Route::get('/stores', [StoresController::class, 'index'])->name('stores');

Route::get('/profile', [UsersController::class, 'show'])->name('profile')->middleware('auth');
Route::post('/profile', [UsersController::class, 'store'])->name('updateProfile')->middleware('auth');
Route::get('/profile/address', [AddressController::class, 'show'])->name('address')->middleware('auth');
Route::post('/profile/address', [AddressController::class, 'store'])->name('updateAddress')->middleware('auth');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist')->middleware('auth');

Route::get('/orders', [OrderController::class, 'index'])->name('orders')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/cart/{id}', [CartController::class, 'destroy'])->name('deleteCart')->middleware('auth');


Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout')->middleware('auth');


Route::get('/products/{id}', [ProductsController::class, 'show'])->name('showProduct');
Route::post('/products/{id}', [SendOrderController::class, 'store'])->name('sendOrder')->middleware('auth');


Route::get('/seller-dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/seller-dashboard', [ProductsController::class, 'dash_index'])->name('dashboard.products')->middleware('auth');
// Route::get('/seller-dashboard', [OrderController::class, 'dash_orders'])->name('dashboard.orders')->middleware('auth');
// Route::get('/seller-dashboard', [EarningsController::class, 'index'])->name('dashboard.earnings')->middleware('auth');
// Route::get('/seller-dashboard', [StoresController::class, 'dash_store'])->name('dashboard.store')->middleware('auth');






