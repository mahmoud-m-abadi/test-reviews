<?php

namespace App\Http\Controllers\api\v1\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Review\AddReviewCommentRequest;
use App\Http\Requests\v1\Review\ReviewApproveRequest;
use App\Http\Resources\v1\Review\ReviewCommentResource;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\ReviewCommentInterface;
use App\Models\Product;
use App\Models\Review\ReviewComment;
use App\Repositories\Review\ReviewCommentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

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

    /**
     * @param ReviewComment $reviewComment
     * @param ReviewApproveRequest $request
     *
     * @return JsonResponse
     */
    public function approve(
        ReviewComment $reviewComment,
        ReviewApproveRequest   $request
    )
    {
        $this->repository->changeApprove(
            $reviewComment,
            $request->get(ReviewCommentInterface::APPROVED)
        );

        return $this->getResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Product $product
     * @param AddReviewCommentRequest $request
     * @return ReviewCommentResource
     */
    public function clientAddReview(
        Product $product,
        AddReviewCommentRequest $request
    )
    {
        $result = $this->repository->store(
            collect($request->validated())
                ->put(ReviewCommentInterface::USER_ID, 1)
                ->put(ReviewCommentInterface::PRODUCT_ID, $product->getId())
                ->toArray()
        );

        return new ReviewCommentResource($result);
    }
}
