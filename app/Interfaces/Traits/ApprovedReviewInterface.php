<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

interface ApprovedReviewInterface
{
    /**
     * @return Builder|HasMany
     */
    public function approvedReviewComments(): Builder|HasMany;

    /**
     * @return Builder|HasMany
     */
    public function approvedReviewVotes(): Builder|HasMany;

    /**
     * @return int
     */
    public function avgApprovedReviewVotes(): int;
}
