<?php

namespace App\Http\Requests\v1\Product;

use App\Base\BaseRequest;
use App\Interfaces\Models\ProductInterface;

class ProductEnableReviewForBuyerRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            ProductInterface::ENABLE_REVIEW_FOR_BUYER => [
                'required',
                'boolean',
            ]
        ];
    }
}
