<?php

namespace App\Traits;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasProviderIdTrait
{
    /**
     * @param Builder $builder Builder.
     * @param string  $value   Provider.
     *
     * @return Builder
     */
    public function scopeOrWhereProviderId(Builder $builder, string $value): Builder
    {
        return $builder->orWhere(self::PROVIDER_ID, $value);
    }

    /**
     * @return BelongsTo
     */
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}
