<?php

namespace App\Traits;

use App\Interfaces\Models\ReviewVoteInterface;
use App\Models\Review\ReviewComment;
use App\Models\Review\ReviewVote;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ApprovedReviewTrait
{
    /**
     * @return Builder|HasMany
     */
    public function approvedReviewComments(): Builder|HasMany
    {
        return $this->hasMany(ReviewComment::class)
            ->approved();
    }

    /**
     * @return Builder|HasMany
     */
    public function approvedReviewVotes(): Builder|HasMany
    {
        return $this->hasMany(ReviewVote::class)
            ->approved();
    }

    /**
     * @return int
     */
    public function avgApprovedReviewVotes(): int
    {
        return $this->approvedReviewVotes
            ->avg(ReviewVoteInterface::RATING) ?? 0;
    }
}
