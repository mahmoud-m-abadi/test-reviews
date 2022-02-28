<?php

namespace App\Traits;

use App\Interfaces\Traits\HasEnableVoteInterface;
use Illuminate\Database\Query\Builder;

trait HasEnableVoteTrait
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeVoteEnabled(Builder $builder): Builder
    {
        return $builder->whereEnableVote(true);
    }

    /**
     * @param bool $enable Enable.
     *
     * @return HasEnableVoteInterface
     */
    public function changeEnableVote(bool $enable = true): HasEnableVoteInterface
    {
        $this->setEnableVote($enable);
        $this->save();

        return $this;
    }
}
