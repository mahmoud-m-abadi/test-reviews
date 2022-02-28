<?php

namespace App\Traits;

use App\Interfaces\FiltersInterface;
use Illuminate\Database\Eloquent\Builder;

trait ScopeFilterTrait
{
    /**
     * Filter scope.
     *
     * @param Builder          $builder Builder.
     * @param FiltersInterface $filters Filters.
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, FiltersInterface $filters): Builder
    {
        return $filters->apply($builder);
    }
}
