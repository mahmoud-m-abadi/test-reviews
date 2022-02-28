<?php

namespace App\Interfaces\Models;

use App\Interfaces\Traits\HasApprovedInterface;
use App\Interfaces\Traits\HasBodyInterface;
use App\Interfaces\Traits\HasIdInterface;
use App\Interfaces\Traits\HasProductIdInterface;
use App\Interfaces\Traits\HasTitleInterface;
use App\Interfaces\Traits\HasUserIdInterface;

interface ReviewCommentInterface extends
    HasIdInterface,
    HasUserIdInterface,
    HasProductIdInterface,
    HasTitleInterface,
    HasBodyInterface,
    HasApprovedInterface
{
    const TABLE = 'review_comments';

    /**
     * @param UserInterface $user
     * @param ProductInterface $product
     * @param string $title
     * @param string $body
     * @param bool $approved
     * @return ReviewCommentInterface
     */
    public static function createObject(
        UserInterface $user,
        ProductInterface $product,
        string $title,
        string $body,
        bool $approved = false,
    ): ReviewCommentInterface;
}
