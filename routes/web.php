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
| Aquí se registran todas las rutas web de la aplicación.
| Estas rutas son cargadas por el RouteServiceProvider dentro del grupo "web".
| Se utilizan middlewares para restringir el acceso a ciertos usuarios.
|
*/

// Ruta principal (Página de inicio), muestra los productos disponibles
Route::get('/', [ProductController::class, 'index'])
    ->name('home')
    ->middleware(GuestOrVerified::class);

// Ruta para ver productos de una categoría específica (se busca por 'slug')
Route::get('/category/{category:slug}', [ProductController::class, 'byCategory'])
    ->name('byCategory')
    ->middleware(GuestOrVerified::class);

// Ruta para ver los detalles de un producto específico (se busca por 'slug')
Route::get('/product/{product:slug}', [ProductController::class, 'view'])
    ->name('product.view')
    ->middleware(GuestOrVerified::class);

// Grupo de rutas relacionadas con el carrito de compras
Route::prefix('/cart')->name('cart.')->group(function () {
    
    // Ruta para ver el contenido del carrito
    Route::get('/', [CartController::class, 'index'])
        ->name('index')
        ->middleware(GuestOrVerified::class);

    // Ruta para agregar un producto al carrito
    Route::post('/add/{product:slug}', [CartController::class, 'add'])
        ->name('add')
        ->middleware(GuestOrVerified::class);

    // Ruta para remover un producto del carrito
    Route::post('/remove/{product:slug}', [CartController::class, 'remove'])
        ->name('remove')
        ->middleware(GuestOrVerified::class);

    // Ruta para actualizar la cantidad de un producto en el carrito
    Route::post('/update-quantity/{product:slug}', [CartController::class, 'updateQuantity'])
        ->name('update-quantity')
        ->middleware(GuestOrVerified::class);
});

// Grupo de rutas protegidas por autenticación y verificación de cuenta
Route::middleware(['auth', 'verified'])->group(function() {
    
    // Ruta para ver el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile');
    
    // Ruta para actualizar la información del perfil
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.update');

    // Ruta para actualizar la contraseña del usuario
    Route::post('/profile/password-update', [ProfileController::class, 'passwordUpdate'])->name('profile_password.update');

    // Ruta para iniciar el proceso de pago del carrito
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('cart.checkout');

    // Ruta para procesar el pago de un pedido específico
    Route::post('/checkout/{order}', [CheckoutController::class, 'checkoutOrder'])->name('cart.checkout-order');

    // Ruta para mostrar la confirmación de pago exitoso
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    // Ruta para mostrar la página de error en caso de fallo en el pago
    Route::get('/checkout/failure', [CheckoutController::class, 'failure'])->name('checkout.failure');

    // Ruta para ver la lista de pedidos del usuario
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');

    // Ruta para ver los detalles de un pedido específico
    Route::get('/orders/{order}', [OrderController::class, 'view'])->name('order.view');
});

// Ruta para manejar el webhook de Stripe (notificaciones automáticas de pago)
Route::post('/webhook/stripe', [CheckoutController::class, 'webhook']);

// Carga las rutas de autenticación generadas por Laravel
require __DIR__ . '/auth.php';
