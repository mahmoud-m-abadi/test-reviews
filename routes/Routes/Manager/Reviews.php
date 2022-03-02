<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\Review\ReviewCommentController;
use App\Http\Controllers\api\v1\Review\ReviewVoteController;

/** Review Comments */
Route::put('review-comments/{reviewComment}/approve', [ReviewCommentController::class, 'approve'])
    ->name('reviews.comments.approve');
Route::resource('review-comments', ReviewCommentController::class)
    ->only(['index']);

/** Review Votes */
Route::put('review-votes/{reviewVote}/approve', [ReviewVoteController::class, 'approve'])
    ->name('reviews.votes.approve');
Route::resource('review-votes', ReviewVoteController::class)
    ->only(['index']);
