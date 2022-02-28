<?php

namespace App\Repositories;

use App\Base\BaseRepository;
use App\Models\Provider;

class ProviderRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Provider::class;
    }
}
