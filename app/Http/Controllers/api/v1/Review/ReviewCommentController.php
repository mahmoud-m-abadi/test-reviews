<?php

namespace App\Http\Controllers\api\v1\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Review\AddReviewCommentRequest;
use App\Http\Requests\v1\Review\ReviewApproveRequest;
use App\Http\Resources\v1\Review\ReviewCommentResource;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\ReviewCommentInterface;
use App\Repositories\Review\ReviewCommentRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReviewCommentController extends Controller
{
    private ReviewCommentRepository $repository;

    public function __construct(ReviewCommentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ReviewCommentResource::collection(
            $this->repository->all()
        );
    }

    public function approve(
        ReviewCommentInterface $review,
        ReviewApproveRequest   $request
    )
    {
        $this->repository->changeApprove($request->get(ReviewCommentInterface::APPROVED));
    }

    /**
     * @param ProductInterface $product
     * @param AddReviewCommentRequest $request
     * @return ReviewCommentResource
     */
    public function clientAddReview(
        ProductInterface $product,
        AddReviewCommentRequest $request
    )
    {
        $result = $this->repository->store(
            collect($request->validated())
                ->put(ReviewCommentInterface::PRODUCT_ID, $product->getId())
                ->toArray()
        );

        return new ReviewCommentResource($result);
    }
}
