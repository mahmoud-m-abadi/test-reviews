<?php

namespace App\Interfaces\Traits;

use App\Interfaces\Models\ReviewInterface;
use Illuminate\Database\Eloquent\Builder;

interface HasApprovedInterface
{
    const APPROVED = 'approved';
    const APPROVED_YES = 1;
    const APPROVED_NO = 0;

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeApproved(Builder $builder): Builder;

    /**
     * @param bool $approve Approve.
     *
     * @return ReviewInterface
     */
    public function changeApprove(bool $approve = true): ReviewInterface;
}
