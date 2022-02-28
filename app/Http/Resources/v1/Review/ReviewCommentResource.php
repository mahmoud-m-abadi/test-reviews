<?php

namespace App\Http\Resources\v1\Review;

use App\Http\Resources\v1\ProductResource;
use App\Http\Resources\v1\UserResource;
use App\Interfaces\Models\ReviewCommentInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewCommentResource extends JsonResource
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
            ReviewCommentInterface::ID => $this->getId(),
            ReviewCommentInterface::USER_ID => $this->getUserId(),
            ReviewCommentInterface::PRODUCT_ID => $this->getProductId(),
            ReviewCommentInterface::TITLE => $this->getTitle(),
            ReviewCommentInterface::BODY => $this->getBody(),
            ReviewCommentInterface::APPROVED => $this->getApproved(),

            'user' => new UserResource($this->whenLoaded('user')),
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
