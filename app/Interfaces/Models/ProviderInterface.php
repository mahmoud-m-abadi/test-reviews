<?php

namespace App\Interfaces\Models;

use App\Interfaces\Traits\HasIdInterface;
use App\Interfaces\Traits\HasNameInterface;

interface ProviderInterface extends
    HasIdInterface,
    HasNameInterface
{
    const TABLE = 'providers';
}
