<?php

namespace App\Http\Requests\v1\Review;

use App\Base\BaseRequest;
use App\Interfaces\Models\ReviewCommentInterface;
use App\Rules\UserCanAddReviewCommentRule;

class AddReviewCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            ReviewCommentInterface::TITLE => [
                'required',
                'min:3',
                'max:150',
                new UserCanAddReviewCommentRule($this->product)
            ],
            ReviewCommentInterface::BODY => [
                'required',
                'min:3'
            ]
        ];
    }
}
