<?php

namespace App\Traits;

use App\Interfaces\Traits\HasPublishedInterface;
use Illuminate\Database\Eloquent\Builder;

trait HasPublishedTrait
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopePublished(Builder $builder): Builder
    {
        return $builder->wherePublished(true);
    }

    /**
     * @param bool $publish Publish.
     *
     * @return HasPublishedInterface
     */
    public function changePublished(bool $publish = true): HasPublishedInterface
    {
        $this->setPublished($publish);
        $this->save();

        return $this;
    }
}
