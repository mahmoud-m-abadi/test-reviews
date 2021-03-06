<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\Review\ReviewCommentController;
use App\Http\Controllers\api\v1\Review\ReviewVoteController;

Route::post('products/{product}/add-review-comment', [ReviewCommentController::class, 'clientAddReview'])
    ->name('reviews.clientAddReviewComment');

Route::post('products/{product}/add-review-vote', [ReviewVoteController::class, 'clientAddReview'])
    ->name('reviews.clientAddReviewVote');
