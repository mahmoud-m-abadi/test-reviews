<?php

namespace App\Http\Requests\v1\Product;

use App\Base\BaseRequest;
use App\Interfaces\Models\ProductInterface;

class ProductEnableCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            ProductInterface::ENABLE_COMMENT => [
                'required',
                'boolean',
            ]
        ];
    }
}
