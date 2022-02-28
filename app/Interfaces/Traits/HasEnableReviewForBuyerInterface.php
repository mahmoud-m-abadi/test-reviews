<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Query\Builder;

interface HasEnableReviewForBuyerInterface
{
    const ENABLE_REVIEW_FOR_BUYER = 'enable_review_for_buyer';

    const ENABLE_REVIEW_FOR_BUYER_YES = 1;
    const ENABLE_REVIEW_FOR_BUYER_NO = 0;

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeReviewForBuyerEnabled(Builder $builder): Builder;

    /**
     * @param bool $enable Enable.
     *
     * @return HasEnableReviewForBuyerInterface
     */
    public function changeEnableReviewForBuyer(bool $enable = true): HasEnableReviewForBuyerInterface;
}
