<?php

namespace App\Models;

use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\UserInterface;
use App\Traits\HasEmailTrait;
use App\Traits\HasIdTrait;
use App\Traits\HasNameTrait;
use App\Traits\HasPasswordTrait;
use App\Traits\ScopeFilterTrait;
use App\Traits\HasStatusTrait;
use App\Traits\MagicMethodsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements
    UserInterface,
    BaseModelInterface
{
    use HasApiTokens,
        HasFactory,
        Notifiable,

        MagicMethodsTrait,
        ScopeFilterTrait,
        HasIdTrait,
        HasEmailTrait,
        HasPasswordTrait,
        HasNameTrait,
        HasStatusTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT => 'datetime',
    ];

    /**
     * @param ProductInterface $product Product.
     *
     * @return bool
     */
    public function hasPurchasedProduct(ProductInterface $product): bool
    {
        /**
         * We can check the user has purchased this product or not when we have Order/Basket module
         */

        return true;
    }
}
