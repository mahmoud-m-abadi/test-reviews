<?php

namespace App\Interfaces\Models;

use App\Interfaces\Traits\HasEmailInterface;
use App\Interfaces\Traits\HasIdInterface;
use App\Interfaces\Traits\HasNameInterface;
use App\Interfaces\Traits\HasPasswordInterface;
use App\Interfaces\Traits\HasStatusInterface;

interface UserInterface extends
    HasIdInterface,
    HasEmailInterface,
    HasPasswordInterface,
    HasNameInterface,
    HasStatusInterface
{
    const TABLE = 'users';
    const EMAIL_VERIFIED_AT = 'email_verified_at';
    const REMEMBER_TOKEN = 'remember_token';
}
