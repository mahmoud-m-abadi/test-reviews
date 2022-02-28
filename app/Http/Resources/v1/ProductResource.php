<?php

namespace App\Http\Resources\v1;

use App\Interfaces\Models\ProductInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $userRepository = app()->make(UserRepository::class);
        $userId = 1;

        return [
            ProductInterface::ID => $this->getId(),
            ProductInterface::NAME => $this->getName(),
            ProductInterface::PRICE => $this->getPrice() ?? 0,

            'approvedReviewComments' => $this->when(
                !is_null( $this->approvedReviewComments),
                $this->approvedReviewComments
            ),
            'approvedReviewCommentsCount' => $this->when(
                !is_null( $this->approvedReviewCommentsCount),
                $this->approvedReviewCommentsCount
            ),
            'approvedVotesAvg' => $this->avgApprovedReviewVotes(),

            'userCanAddReviewComment' => $this->userCanAddReviewComment(
                $userRepository->find($userId)
            ),
            'userCanAddReviewVote' => $this->userCanAddReviewVote(
                $userRepository->find($userId)
            ),
        ];
    }
}
