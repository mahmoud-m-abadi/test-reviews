<?php

namespace App\Traits;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasProductIdTrait
{
    /**
     * @param Builder $builder   Builder.
     * @param integer $productId ID.
     *
     * @return Builder
     */
    public function scopeOrWhereProductIdIs(Builder $builder, int $productId): Builder
    {
        return $builder->orWhere(self::PRODUCT_ID, $productId);
    }

    /**
     * @param Builder $builder    Builder.
     * @param array   $productIds Product IDs.
     *
     * @return Builder
     */
    public function scopeWhereProductIdIn(Builder $builder, array $productIds): Builder
    {
        return $builder->whereIn(self::PRODUCT_ID, $productIds);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
