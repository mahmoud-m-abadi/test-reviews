<?php

namespace App\Interfaces\Traits;

use App\Interfaces\Models\UserInterface;

interface UserCanAddReviewInterface
{
    /**
     * @param UserInterface $user User.
     *
     * @return bool
     */
    public function userCanAddReviewComment(UserInterface $user): bool;

    /**
     * @param UserInterface $user User.
     *
     * @return bool
     */
    public function userCanAddReviewVote(UserInterface $user): bool;
}
