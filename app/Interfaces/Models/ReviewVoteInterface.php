<?php

namespace App\Interfaces\Models;

use App\Interfaces\Traits\HasApprovedInterface;
use App\Interfaces\Traits\HasIdInterface;
use App\Interfaces\Traits\HasProductIdInterface;
use App\Interfaces\Traits\HasRatingInterface;
use App\Interfaces\Traits\HasUserIdInterface;

interface ReviewVoteInterface extends
    HasIdInterface,
    HasUserIdInterface,
    HasProductIdInterface,
    HasRatingInterface,
    HasApprovedInterface
{
    const TABLE = 'review_votes';

    /**
     * @param UserInterface $user
     * @param ProductInterface $product
     * @param int $rating
     * @param bool $approved
     * @return ReviewVoteInterface
     */
    public static function createObject(
        UserInterface $user,
        ProductInterface $product,
        int $rating,
        bool $approved = false,
    ): ReviewVoteInterface;
}
