<?php

namespace App\Traits;

use App\Interfaces\Traits\HasApprovedInterface;
use Illuminate\Database\Eloquent\Builder;

trait HasApprovedTrait
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeApproved(Builder $builder): Builder
    {
        return $builder->whereApproved(true);
    }

    /**
     * @param bool $approve Approve.
     *
     * @return HasApprovedInterface
     */
    public function changeApprove(bool $approve = true): HasApprovedInterface
    {
        $this->setApproved($approve);
        $this->save();

        return $this;
    }
}
