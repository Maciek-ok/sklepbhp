<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', [ProductsController::class, 'index'])->name('master');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::delete('/cart/{products}/delete', [CartController::class, 'delete'])->name('cart.delete');

Route::prefix('products')->group(function () {
    Route::get('/{products}', [ProductsController::class, 'show'])->name('show');
    Route::post('/{products}/add-to-cart', [ProductsController::class, 'add_to_cart'])->name('add_to_cart');
});
Route::prefix('orders')->group(function () {
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');

});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';