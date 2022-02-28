<?php

namespace App\Traits;

use App\Interfaces\Traits\HasEnableCommentInterface;
use Illuminate\Database\Query\Builder;

trait HasEnableCommentTrait
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeCommentEnabled(Builder $builder): Builder
    {
        return $builder->whereEnableComment(true);
    }

    /**
     * @param bool $enable Enable.
     *
     * @return HasEnableCommentInterface
     */
    public function changeEnableComment(bool $enable = true): HasEnableCommentInterface
    {
        $this->setEnableComment($enable);
        $this->save();

        return $this;
    }
}
