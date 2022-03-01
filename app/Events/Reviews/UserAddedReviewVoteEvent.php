<?php

namespace App\Events\Reviews;

use App\Interfaces\Models\ReviewVoteInterface;
use Illuminate\Queue\SerializesModels;

class UserAddedReviewVoteEvent
{
    use SerializesModels;

    public ReviewVoteInterface $vote;

    /**
     * @param ReviewVoteInterface $vote
     */
    public function __construct(ReviewVoteInterface $vote)
    {
        $this->vote = $vote;
    }
}
