<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ProductController;

/** Products */
Route::put('products/{product}/publish', [ProductController::class, 'publish'])
    ->name('products.publish');
Route::put('products/{product}/enable-comment', [ProductController::class, 'enableComment'])
    ->name('products.enableComment');
Route::put('products/{product}/enable-vote', [ProductController::class, 'enableVote'])
    ->name('products.enableVote');
Route::put('products/{product}/enable-review-for-buyer', [ProductController::class, 'enableReviewForBuyer'])
    ->name('products.enableReviewForBuyer');

Route::resource('products', ProductController::class)
    ->only(['index','show']);
