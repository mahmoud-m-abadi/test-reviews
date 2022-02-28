<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;

interface HasPublishedInterface
{
    const PUBLISHED = 'published';

    const PUBLISHED_YES = 1;
    const PUBLISHED_NO = 0;

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopePublished(Builder $builder): Builder;

    /**
     * @param bool $publish Publish.
     *
     * @return HasPublishedInterface
     */
    public function changePublished(bool $publish = true): HasPublishedInterface;
}
