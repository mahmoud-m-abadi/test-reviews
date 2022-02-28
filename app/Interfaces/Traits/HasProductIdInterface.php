<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasProductIdInterface
{
    const PRODUCT_ID = 'product_id';

    /**
     * @param Builder $builder    Builder.
     * @param array   $productIds Product IDs.
     *
     * @return Builder
     */
    public function scopeWhereProductIdIn(Builder $builder, array $productIds): Builder;

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo;
}
