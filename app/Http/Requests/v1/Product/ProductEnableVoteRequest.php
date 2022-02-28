<?php

namespace App\Http\Requests\v1\Product;

use App\Base\BaseRequest;
use App\Interfaces\Models\ProductInterface;

class ProductEnableVoteRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            ProductInterface::ENABLE_VOTE => [
                'required',
                'boolean',
            ]
        ];
    }
}
