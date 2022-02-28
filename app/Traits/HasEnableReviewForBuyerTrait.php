<?php

namespace App\Traits;

use App\Interfaces\Traits\HasEnableReviewForBuyerInterface;
use Illuminate\Database\Query\Builder;

trait HasEnableReviewForBuyerTrait
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeReviewForBuyerEnabled(Builder $builder): Builder
    {
        return $builder->whereEnableReviewForBuyer(true);
    }

    /**
     * @param bool $enable Enable.
     *
     * @return HasEnableReviewForBuyerInterface
     */
    public function changeEnableReviewForBuyer(bool $enable = true): HasEnableReviewForBuyerInterface
    {
        $this->setEnableReviewForBuyer($enable);
        $this->save();

        return $this;
    }
}
