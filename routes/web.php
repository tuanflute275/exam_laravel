<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'hi';
})->name('home');

Route::resource('product', productController::class);
Route::resource('category', categoryController::class);
