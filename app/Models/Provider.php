<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Interfaces\Models\ProviderInterface;
use App\Traits\HasIdTrait;
use App\Traits\HasNameTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends BaseModel implements ProviderInterface
{
    use HasFactory,
        HasIdTrait,
        HasNameTrait;
}
