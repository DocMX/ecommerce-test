<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\GuestOrVerified;

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
Route::get('/', [ProductController::class, 'index'])
    ->name('home')
    ->middleware(GuestOrVerified::class);

Route::get('/category/{category:slug}', [ProductController::class, 'byCategory'])
    ->name('byCategory')
    ->middleware(GuestOrVerified::class);

Route::get('/product/{product:slug}', [ProductController::class, 'view'])
    ->name('product.view')
    ->middleware(GuestOrVerified::class);

// Rutas del carrito de compras
Route::prefix('/cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])
        ->name('index')
        ->middleware(GuestOrVerified::class);

    Route::post('/add/{product:slug}', [CartController::class, 'add'])
        ->name('add')
        ->middleware(GuestOrVerified::class);

    Route::post('/remove/{product:slug}', [CartController::class, 'remove'])
        ->name('remove')
        ->middleware(GuestOrVerified::class);

    Route::post('/update-quantity/{product:slug}', [CartController::class, 'updateQuantity'])
        ->name('update-quantity')
        ->middleware(GuestOrVerified::class);
});



Route::post('/webhook/stripe', [CheckoutController::class, 'webhook']);

require __DIR__ . '/auth.php';