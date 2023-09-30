<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\PageController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;


Route::prefix('')->group(function () {
    Route::get('/', [PageController::class, 'homePage'])->name('home');
    Route::get('detail/{id}', [PageController::class, 'detailPage'])->name('detail');
    Route::get('shop', [PageController::class, 'shop_page'])->name('shop');
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'show'])->name('show_cart');
        Route::post('/{id}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
        Route::post('update/{id}', [CartController::class, 'update_cart'])->name('update_cart');
        Route::get('delete/{id}', [CartController::class, 'delete_cart'])->name('delete_cart');
        Route::get('/clear', [CartController::class, 'clear'])->name('clear');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product', productController::class);
    Route::resource('category', categoryController::class);
});
