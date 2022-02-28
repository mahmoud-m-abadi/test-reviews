<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasCreatorIdInterface
{
    const CREATOR_ID = 'creator_id';

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo;
}
