<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ProductController;

/** Products */
Route::get('products', [ProductController::class, 'clientProductList'])
    ->name('products.clientProductList');

Route::get('products/{product}', [ProductController::class, 'clientProductShow'])
    ->name('reviews.clientProductShow');
