<?php

namespace App\Http\Controllers\api\v1\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Review\AddReviewVoteRequest;
use App\Http\Requests\v1\Review\ReviewApproveRequest;
use App\Http\Resources\v1\Review\ReviewVoteResource;
use App\Interfaces\Models\ReviewVoteInterface;
use App\Models\Product;
use App\Models\Review\ReviewVote;
use App\Repositories\Review\ReviewVoteRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ReviewVoteController extends Controller
{
    private ReviewVoteRepository $repository;

    public function __construct(ReviewVoteRepository $repository)
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
        return ReviewVoteResource::collection(
            $this->repository->all()
        );
    }

    /**
     * @param ReviewVote $reviewVote
     * @param ReviewApproveRequest $request
     *
     * @return JsonResponse
     */
    public function approve(
        ReviewVote $reviewVote,
        ReviewApproveRequest   $request
    )
    {
        $this->repository->changeApprove(
            $reviewVote,
            $request->get(ReviewVoteInterface::APPROVED)
        );

        return $this->getResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Product $product
     * @param AddReviewVoteRequest $request
     *
     * @return ReviewVoteResource
     */
    public function clientAddReview(
        Product $product,
        AddReviewVoteRequest $request
    )
    {
        $result = $this->repository->store(
            collect($request->validated())
                ->put(ReviewVoteInterface::USER_ID, 1)
                ->put(ReviewVoteInterface::PRODUCT_ID, $product->getId())
                ->toArray()
        );

        return new ReviewVoteResource($result);
    }
}
