<?php

namespace App\Interfaces\Models;

use App\Interfaces\Traits\HasApprovedInterface;
use App\Interfaces\Traits\HasIdInterface;
use App\Interfaces\Traits\HasProductIdInterface;
use App\Interfaces\Traits\HasUserIdInterface;

interface ReviewInterface extends
    HasIdInterface,
    HasProductIdInterface,
    HasUserIdInterface,
    HasApprovedInterface
{

}
