<?php

namespace App\Rules;

use App\Interfaces\Models\ProductInterface;
use Illuminate\Contracts\Validation\Rule;

class UserCanAddReviewCommentRule implements Rule
{
    private ProductInterface $product;

    /**
     * @param ProductInterface $product
     */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function passes($attribute, $value)
    {
        return $this->product->userCanAddReviewComment(request()->user());
    }

    public function message()
    {
        return 'User can not add review comment for this product';
    }
}
