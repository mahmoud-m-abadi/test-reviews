<?php

namespace App\Models\Review;

use App\Base\BaseModel;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\ReviewCommentInterface;
use App\Interfaces\Models\UserInterface;
use App\Traits\HasApprovedTrait;
use App\Traits\HasBodyTrait;
use App\Traits\HasIdTrait;
use App\Traits\HasProductIdTrait;
use App\Traits\HasTitleTrait;
use App\Traits\HasUserIdTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReviewComment extends BaseModel implements ReviewCommentInterface
{
    use HasFactory,
        HasIdTrait,
        HasUserIdTrait,
        HasProductIdTrait,
        HasTitleTrait,
        HasBodyTrait,
        HasApprovedTrait;

    protected $fillable = [
        self::APPROVED,
    ];

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
    ): ReviewCommentInterface {
        $item = new self();
        $item->setUserId($user->getId());
        $item->setProductId($product->getId());
        $item->setTitle($title);
        $item->setBody($body);
        $item->setApproved($approved);
        $item->save();

        return $item;
    }
}
