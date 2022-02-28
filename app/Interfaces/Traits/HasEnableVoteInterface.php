<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Query\Builder;

interface HasEnableVoteInterface
{
    const ENABLE_VOTE = 'enable_vote';

    const ENABLE_VOTE_YES = 1;
    const ENABLE_VOTE_NO = 0;

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeVoteEnabled(Builder $builder): Builder;

    /**
     * @param bool $enable Enable.
     *
     * @return HasEnableVoteInterface
     */
    public function changeEnableVote(bool $enable = true): HasEnableVoteInterface;
}
