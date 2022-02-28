<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\ProviderInterface;
use App\Interfaces\Models\UserInterface;
use App\Models\Review\ReviewComment;
use App\Traits\ApprovedReviewTrait;
use App\Traits\HasCreatorIdTrait;
use App\Traits\HasEnableCommentTrait;
use App\Traits\HasEnableReviewForBuyerTrait;
use App\Traits\HasEnableVoteTrait;
use App\Traits\HasIdTrait;
use App\Traits\HasNameTrait;
use App\Traits\HasPriceTrait;
use App\Traits\HasProviderIdTrait;
use App\Traits\HasPublishedTrait;
use App\Traits\UserCanAddReviewTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends BaseModel implements ProductInterface
{
    use HasFactory,
        HasIdTrait,
        HasProviderIdTrait,
        HasCreatorIdTrait,
        HasPublishedTrait,
        HasEnableCommentTrait,
        HasEnableVoteTrait,
        HasEnableReviewForBuyerTrait,
        HasPriceTrait,
        HasNameTrait,
        ApprovedReviewTrait,
        UserCanAddReviewTrait;

    protected $fillable = [
        self::ENABLE_REVIEW_FOR_BUYER,
        self::ENABLE_COMMENT,
        self::ENABLE_VOTE,
        self::PUBLISHED,
    ];

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ReviewComment::class);
    }

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
    ): ProductInterface {
        $item = new self();
        $item->setCreatorId($creator->getId());
        $item->setProviderId($provider->getId());
        $item->setPublished($published);
        $item->setEnableComment($enableComment);
        $item->setEnableVote($enableVote);
        $item->setEnableReviewForBuyer($enableReviewForBuyer);
        $item->setPrice($price);
        $item->save();

        return $item;
    }
}
