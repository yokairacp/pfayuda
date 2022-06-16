<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaC;
use App\Http\Controllers\CheckoutController;


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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/carrito', [HomeController::class, 'carrito'])->middleware('auth')->name('carrito.index');

Route::post('/checkout', [CheckoutController::class, 'checkout'])->middleware('auth')->name('carrito.factura2');

Route::get('/invoice', [CheckoutController::class, 'invoice'])->middleware('auth')->name('carrito');

Route::get('/pdf', [HomeController::class, 'pdf'])->middleware('auth')->name('carrito.pdf');

Route::put('/carrito/{producto}/update/c={cantidad}', [HomeController::class, 'updateProducto'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth.admin')->name('dashboard.index');

Route::get('/dashboard/productos', [ProductoController::class, 'index'])->middleware('auth.admin')->name('productos.index');

Route::get('/dashboard/productos/create', [ProductoController::class, 'create'])->middleware('auth.admin')->name('productos.create');

Route::get('/dashboard/productos/{producto}/edit', [ProductoController::class, 'edit'])->middleware('auth.admin')->name('productos.edit');

Route::put('/dashboard/productos/{producto}', [ProductoController::class, 'update'])->middleware('auth.admin')->name('productos.update');

Route::post('/dashboard/productos/', [ProductoController::class, 'store'])->middleware('auth.admin')->name('productos.store');

Route::resource('/user', UserController::class);

Route::post('/carrito/{producto}', [HomeController::class, 'add'])->middleware('auth')->name('carrito.add');

Route::get('/dashboard/user', [UserController::class, 'index'])->middleware('auth.admin')->name('user.index');

Route::get('/dashboard/user/{user}/edit', [UserController::class, 'edit'])->middleware('auth.admin')->name('user.edit');

Route::resource('/cliente', ClienteController::class);










