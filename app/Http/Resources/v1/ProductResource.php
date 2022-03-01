<?php

namespace App\Http\Resources\v1;

use App\Http\Resources\v1\Review\ReviewCommentResource;
use App\Http\Resources\v1\Review\ReviewVoteResource;
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
        $userId = $request->user()->getId();

        return [
            ProductInterface::ID => $this->getId(),
            ProductInterface::NAME => $this->getName(),
            ProductInterface::PRICE => $this->getPrice() ?? 0,

            /** Show in the Manager Section */
            ProductInterface::PUBLISHED => $this->when(
                $request->isManager(),
                $this->getPublished() == 1
            ),
            ProductInterface::ENABLE_VOTE => $this->when(
                $request->isManager(),
                $this->getEnableVote() == 1
            ),
            ProductInterface::ENABLE_COMMENT => $this->when(
                $request->isManager(),
                $this->getEnableComment() == 1
            ),
            ProductInterface::ENABLE_REVIEW_FOR_BUYER => $this->when(
                $request->isManager(),
                $this->getEnableReviewForBuyer() == 1
            ),
            'reviewComments' => ReviewCommentResource::collection(
                $this->whenLoaded('reviewComments')
            ),
            'reviewVotes' => ReviewVoteResource::collection(
                $this->whenLoaded('reviewVotes')
            ),

            /** Show in the Client Section */
            'approvedReviewComments' => $this->when(
                $request->isClient(),
                $this->approvedReviewComments
            ),
            'approvedReviewCommentsCount' => $this->when(
                $request->isClient(),
                $this->approved_review_comments_count
            ),
            'approvedVotesAvg' => $this->when(
                $request->isClient(),
                $this->avgApprovedReviewVotes()
            ),
            'userCanAddReviewComment' => $this->when(
                $request->isClient(),
                $this->userCanAddReviewComment(
                    $userRepository->find($userId)
                )
            ),
            'userCanAddReviewVote' => $this->when(
                $request->isClient(),
                $this->userCanAddReviewVote(
                    $userRepository->find($userId)
                )
            ),
        ];
    }
}
