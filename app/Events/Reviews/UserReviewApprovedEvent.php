<?php

namespace App\Events\Reviews;

use App\Interfaces\Models\ReviewInterface;
use Illuminate\Queue\SerializesModels;

class UserReviewApprovedEvent
{
    use SerializesModels;

    public ReviewInterface $review;

    /**
     * @param ReviewInterface $review
     */
    public function __construct(ReviewInterface $review)
    {
        $this->review = $review;
    }
}
