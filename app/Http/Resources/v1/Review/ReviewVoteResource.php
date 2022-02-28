<?php

namespace App\Http\Resources\v1\Review;

use App\Http\Resources\v1\ProductResource;
use App\Http\Resources\v1\UserResource;
use App\Interfaces\Models\ReviewVoteInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewVoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            ReviewVoteInterface::ID => $this->getId(),
            ReviewVoteInterface::USER_ID => $this->getUserId(),
            ReviewVoteInterface::PRODUCT_ID => $this->getProductId(),
            ReviewVoteInterface::RATING => $this->getRating(),
            ReviewVoteInterface::APPROVED => $this->getApproved(),

            'user' => new UserResource($this->whenLoaded('user')),
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
