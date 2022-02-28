<?php

namespace App\Http\Requests\v1\Review;

use App\Base\BaseRequest;
use App\Interfaces\Models\ReviewCommentInterface;

class AddReviewCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            ReviewCommentInterface::TITLE => [
                'required',
                'min:3',
                'max:150'
            ],
            ReviewCommentInterface::BODY => [
                'required',
                'min:3'
            ]
        ];
    }
}
