<?php

namespace App\Events\Reviews;

use App\Interfaces\Models\ReviewCommentInterface;
use Illuminate\Queue\SerializesModels;

class UserAddedReviewCommentEvent
{
    use SerializesModels;

    public ReviewCommentInterface $comment;

    /**
     * @param ReviewCommentInterface $comment
     */
    public function __construct(ReviewCommentInterface $comment)
    {
        $this->comment = $comment;
    }
}
