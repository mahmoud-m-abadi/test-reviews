<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Query\Builder;

interface HasEnableCommentInterface
{
    const ENABLE_COMMENT = 'enable_comment';

    const ENABLE_COMMENT_YES = 1;
    const ENABLE_COMMENT_NO = 0;

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeCommentEnabled(Builder $builder): Builder;

    /**
     * @param bool $enable Enable.
     *
     * @return HasEnableCommentInterface
     */
    public function changeEnableComment(bool $enable = true): HasEnableCommentInterface;
}
