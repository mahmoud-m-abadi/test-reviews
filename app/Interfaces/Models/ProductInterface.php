<?php

namespace App\Interfaces\Models;

use App\Interfaces\Traits\ApprovedReviewInterface;
use App\Interfaces\Traits\HasCreatorIdInterface;
use App\Interfaces\Traits\HasEnableCommentInterface;
use App\Interfaces\Traits\HasEnableReviewForBuyerInterface;
use App\Interfaces\Traits\HasEnableVoteInterface;
use App\Interfaces\Traits\HasIdInterface;
use App\Interfaces\Traits\HasNameInterface;
use App\Interfaces\Traits\HasPriceInterface;
use App\Interfaces\Traits\HasProviderIdInterface;
use App\Interfaces\Traits\HasPublishedInterface;
use App\Interfaces\Traits\UserCanAddReviewInterface;

interface ProductInterface extends
    HasIdInterface,
    HasCreatorIdInterface,
    HasProviderIdInterface,
    HasPublishedInterface,
    HasEnableCommentInterface,
    HasEnableVoteInterface,
    HasEnableReviewForBuyerInterface,
    HasPriceInterface,
    ApprovedReviewInterface,
    UserCanAddReviewInterface,
    HasNameInterface
{
    const TABLE = 'products';

    /**
     * @param UserInterface $creator
     * @param ProviderInterface $provider
     * @param bool $published
     * @param bool $enableComment
     * @param bool $enableVote
     * @param bool $enableReviewForBuyer
     * @param bool $price
     * @return ProductInterface
     */
    public static function createObject(
        UserInterface $creator,
        ProviderInterface $provider,
        bool $published = true,
        bool $enableComment = true,
        bool $enableVote = true,
        bool $enableReviewForBuyer = true,
        bool $price = true
    ): ProductInterface;
}
