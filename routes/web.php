<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

// products homepage
Route::get('/', [ProductController::class, 'index'])->name('products.index');
// form to create new product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');


