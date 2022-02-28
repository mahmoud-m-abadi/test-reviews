<?php

namespace App\Http\Requests\v1\Review;

use App\Base\BaseRequest;
use App\Interfaces\Models\ReviewCommentInterface;

class ReviewApproveRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ReviewCommentInterface::APPROVED => [
                'required',
                'boolean',
            ]
        ];
    }
}
