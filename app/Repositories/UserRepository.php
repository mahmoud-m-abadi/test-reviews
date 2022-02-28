<?php

namespace App\Repositories;

use App\Base\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}
