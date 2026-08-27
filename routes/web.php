<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [CategoryController::class, 'show'])->whereNumber('id')->name('category.show');
Route::get('/product/{id}', [ProductController::class, 'show'])->whereNumber('id')->name('product.show');
