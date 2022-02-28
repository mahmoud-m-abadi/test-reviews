<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasProviderIdInterface
{
    const PROVIDER_ID = 'provider_id';

    /**
     * @param Builder $builder Builder.
     * @param string  $value   Provider.
     *
     * @return Builder
     */
    public function scopeOrWhereProviderId(Builder $builder, string $value): Builder;

    /**
     * @return BelongsTo
     */
    public function provider(): BelongsTo;
}
