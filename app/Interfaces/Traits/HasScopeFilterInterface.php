<?php

namespace App\Interfaces\Traits;

use App\Interfaces\FiltersInterface;
use Illuminate\Database\Eloquent\Builder;

interface HasScopeFilterInterface
{
    /**
     * Filter scope.
     *
     * @param Builder          $builder Builder.
     * @param FiltersInterface $filters Filters.
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, FiltersInterface $filters): Builder;
}
