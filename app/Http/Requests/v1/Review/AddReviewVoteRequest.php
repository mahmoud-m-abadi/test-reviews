<?php

namespace App\Http\Requests\v1\Review;

use App\Base\BaseRequest;
use App\Interfaces\Models\ReviewVoteInterface;

class AddReviewVoteRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            ReviewVoteInterface::RATING => [
                'required',
                'int',
                'between:1,5',
            ],
        ];
    }
}
