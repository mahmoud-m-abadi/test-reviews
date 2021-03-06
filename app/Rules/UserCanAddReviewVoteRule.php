<?php

namespace App\Rules;

use App\Interfaces\Models\ProductInterface;
use Illuminate\Contracts\Validation\Rule;

class UserCanAddReviewVoteRule implements Rule
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
        return $this->product->userCanAddReviewVote(request()->user());
    }

    public function message()
    {
        return 'User can not add review vote for this product';
    }
}
