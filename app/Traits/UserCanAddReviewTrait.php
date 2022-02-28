<?php

namespace App\Traits;

use App\Interfaces\Models\UserInterface;

trait UserCanAddReviewTrait
{
    /**
     * @param UserInterface $user User.
     *
     * @return bool
     */
    public function userCanAddReviewComment(UserInterface $user): bool
    {
        if ($this->getEnableComment()) {
            if ($this->checkReviewForBuyer($user)) {
                return false;
            }

            return true;
        }

        return false;
    }

    /**
     * @param UserInterface $user User.
     *
     * @return bool
     */
    public function userCanAddReviewVote(UserInterface $user): bool
    {
        if ($this->getEnableVote()) {
            if ($this->checkReviewForBuyer($user)) {
                return false;
            }

            return true;
        }

        return false;
    }

    /**
     * @param UserInterface $user User.
     *
     * @return bool
     */
    private function checkReviewForBuyer(UserInterface $user): bool
    {
        return $this->getEnableReviewForBuyer()
            AND !$user->hasPurchasedProduct($this);
    }
}
