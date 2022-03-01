<?php

namespace App\Traits;

use App\Interfaces\Models\ReviewInterface;
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
     * @return ReviewInterface
     */
    public function changeApprove(bool $approve = true): ReviewInterface
    {
        $this->setApproved($approve);
        $this->save();

        return $this;
    }
}
