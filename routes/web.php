<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
        Route::middleware(['is.admin'])->group(function () {
            Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
            Route::post('/products/add', [ProductController::class, 'store'])->name('admin.products.store');
        });
        Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/clear', [CartController::class, 'empty'])->name('cart.clear');
});
