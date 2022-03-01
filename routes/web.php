<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\EarningsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;



Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/filter', [HomeController::class, 'filter'])->name('applyFilter');
Route::get('/sort', [HomeController::class, 'sort'])->name('applySort');


Route::get('/store/{id}', [StoresController::class, 'show'])->name('showStore');
Route::get('/seller/store/create', [StoresController::class, 'create'])->name('createStore')->middleware('auth', 'checkUserType:seller');
Route::post('/seller/store/save', [StoresController::class, 'save'])->name('saveStore')->middleware('auth', 'checkUserType:seller');
Route::get('/stores', [StoresController::class, 'index'])->name('stores');

Route::get('/profile', [UsersController::class, 'show'])->name('profile')->middleware('auth');
Route::post('/profile', [UsersController::class, 'store'])->name('updateProfile')->middleware('auth');
Route::get('/profile/address', [AddressController::class, 'show'])->name('address')->middleware('auth');
Route::post('/profile/address', [AddressController::class, 'store'])->name('updateAddress')->middleware('auth');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist')->middleware('auth');

Route::get('/orders', [OrderController::class, 'index'])->name('orders')->middleware('auth');
Route::get('orders/sort', [OrderController::class, 'orders_sort'])->name('orderSortByBuyer')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/cart/{id}', [CartController::class, 'destroy'])->name('deleteCart')->middleware('auth');


Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout')->middleware('auth');


Route::get('/products/{id}', [ProductsController::class, 'show'])->name('showProduct');
Route::post('/products/{id}', [SendOrderController::class, 'store'])->name('sendOrder')->middleware('auth');

Route::get('/products/{id}/review', [ReviewsController::class, 'create'])->name('createReview');
Route::post('/products/{id}/review', [ReviewsController::class, 'new']);
Route::get('/products/{id}/review/edit', [ReviewsController::class, 'edit'])->name('editReview');
Route::post('/products/{id}/review/edit', [ReviewsController::class, 'store']);
Route::get('/products/{id}/review/delete', [ReviewsController::class, 'destroy'])->name('deleteReview');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth', 'checkUserType:seller');
Route::get('/seller/products', [ProductsController::class, 'dash_index'])->name('dashboard.products')->middleware('auth', 'checkUserType:seller');
Route::get('/seller/products/create', [ProductsController::class, 'create'])->name('createProduct')->middleware('auth', 'checkUserType:seller');
Route::get('/seller/products/{id}/edit', [ProductsController::class, 'edit'])->name('editProduct')->middleware('auth', 'checkUserType:seller');
Route::post('/seller/products/save', [ProductsController::class, 'store'])->name('saveProduct')->middleware('auth', 'checkUserType:seller');
Route::post('/seller/products/{id}/update', [ProductsController::class, 'update'])->name('updateProduct')->middleware('auth', 'checkUserType:seller');
Route::get('/seller/products/{id}', [ProductsController::class, 'destroy'])->name('deleteProduct')->middleware('auth', 'checkUserType:seller');

Route::get('/seller-dashboard/orders', [OrderController::class, 'dash_orders'])->name('dashboard.orders')->middleware('auth', 'checkUserType:seller');
Route::get('/seller-dashboard/orders/sort', [OrderController::class, 'dash_orders_sort'])->name('orderSortBy')->middleware('auth', 'checkUserType:seller');
Route::get('/seller-dashboard/orders/{id}/complete', [OrderController::class, 'complete'])->name('completeOrder')->middleware('auth', 'checkUserType:seller');

Route::get('/seller-dashboard/earnings', [EarningsController::class, 'index'])->name('dashboard.earnings')->middleware('auth', 'checkUserType:seller');
Route::get('/seller-dashboard/store', [StoresController::class, 'dash_store'])->name('dashboard.store')->middleware('auth', 'checkUserType:seller');


Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin')->middleware('auth');
Route::get('/admin/sellers', [AdminController::class, 'sellers'])->name('admin.sellers')->middleware('auth');
Route::get('/admin/buyers', [AdminController::class, 'buyers'])->name('admin.buyers')->middleware('auth');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders')->middleware('auth');
Route::get('/admin/stores', [AdminController::class, 'stores'])->name('admin.stores')->middleware('auth');

Route::get('products/{id}/contactSeller', [MessagesController::class, 'contactSeller'])->name('contactSeller')->middleware('auth');
Route::post('/sendMessage', [MessagesController::class, 'sendMessage'])->name('sendMessage')->middleware('auth');
Route::get('/messages', [MessagesController::class, 'index'])->name('messages')->middleware('auth');
Route::get('/seller/messages', [MessagesController::class, 'dash_index'])->name('dashboard.messages')->middleware('auth', 'checkUserType:seller');
Route::get('/seller/messages/{id}', [MessagesController::class, 'show'])->name('showMessage')->middleware('auth', 'checkUserType:seller');
Route::get('/messages/{id}', [MessagesController::class, 'showBuyer'])->name('showMessageBuyer')->middleware('auth');
Route::get('/seller/messages/{id}/reply', [MessagesController::class, 'reply'])->name('reply')->middleware('auth', 'checkUserType:seller');







