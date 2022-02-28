<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\Review\ReviewCommentController;

/** Review Comments */
Route::put('reviews-comments/{review}/approve', [ReviewCommentController::class, 'approve'])
    ->name('reviews.comments.approve');
Route::resource('reviews-comments', ReviewCommentController::class)
    ->only(['index']);

/** Review Votes */
Route::put('reviews-votes/{review}/approve', [ReviewVoteController::class, 'approve'])
    ->name('reviews.votes.approve');
Route::resource('reviews-votes', ReviewVoteController::class)
    ->only(['index']);
