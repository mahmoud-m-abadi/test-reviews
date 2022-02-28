<?php

namespace App\Http\Controllers\api\v1\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Review\AddReviewVoteRequest;
use App\Http\Requests\v1\Review\ReviewApproveRequest;
use App\Http\Resources\v1\Review\ReviewVoteResource;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\ReviewVoteInterface;
use App\Repositories\Review\ReviewVoteRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use function collect;

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

    public function approve(
        ReviewVoteInterface $review,
        ReviewApproveRequest   $request
    )
    {
        $this->repository->changeApprove($request->get(ReviewVoteInterface::APPROVED));
    }

    /**
     * @param ProductInterface $product
     * @param AddReviewVoteRequest $request
     * @return ReviewVoteResource
     */
    public function clientAddReview(
        ProductInterface $product,
        AddReviewVoteRequest $request
    )
    {
        $result = $this->repository->store(
            collect($request->validated())
                ->put(ReviewVoteInterface::PRODUCT_ID, $product->getId())
                ->toArray()
        );

        return new ReviewVoteResource($result);
    }
}
