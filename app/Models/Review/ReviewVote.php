<?php

namespace App\Models\Review;

use App\Base\BaseModel;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\ReviewVoteInterface;
use App\Interfaces\Models\UserInterface;
use App\Traits\HasApprovedTrait;
use App\Traits\HasBodyTrait;
use App\Traits\HasIdTrait;
use App\Traits\HasProductIdTrait;
use App\Traits\HasRatingTrait;
use App\Traits\HasRecommendTrait;
use App\Traits\HasTitleTrait;
use App\Traits\HasUserIdTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewVote extends BaseModel implements ReviewVoteInterface
{
    use HasFactory,
        HasIdTrait,
        HasUserIdTrait,
        HasProductIdTrait,
        HasTitleTrait,
        HasBodyTrait,
        HasRatingTrait,
        HasRecommendTrait,
        HasApprovedTrait;

    protected $fillable = [
        self::APPROVED,
    ];

    public $timestamps = false;

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
    ): ReviewVoteInterface {
        $item = new self();
        $item->setUserId($user->getId());
        $item->setProductId($product->getId());
        $item->setRating($rating);
        $item->setApproved($approved);
        $item->setCreatedAt(now()->format('Y-m-d H:i:s'));
        $item->save();

        return $item;
    }
}
