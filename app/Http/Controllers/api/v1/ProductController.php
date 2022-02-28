<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Product\ProductEnableCommentRequest;
use App\Http\Requests\v1\Product\ProductEnableReviewForBuyerRequest;
use App\Http\Requests\v1\Product\ProductEnableVoteRequest;
use App\Http\Requests\v1\Product\ProductPublishRequest;
use App\Http\Resources\v1\ProductResource;
use App\Interfaces\Models\ProductInterface;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    private ProductRepository $repository;

    public function __construct(
        ProductRepository $repository,
    )
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
        return ProductResource::collection(
            $this->repository->all(true)
        );
    }

    /**
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource(
            $product->load(['reviewComments', 'reviewVotes'])
        );
    }

    /**
     * @param Product $product
     * @param ProductPublishRequest $request
     *
     * @return JsonResponse
     */
    public function publish(
        Product $product,
        ProductPublishRequest $request
    )
    {
        $this->repository->changePublished(
            $product,
            $request->get(ProductInterface::PUBLISHED)
        );

        return $this->getResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Product $product
     * @param ProductEnableCommentRequest $request
     *
     * @return JsonResponse
     */
    public function enableComment(
        Product $product,
        ProductEnableCommentRequest $request
    )
    {
        $this->repository->enableComment(
            $product,
            $request->get(ProductInterface::ENABLE_COMMENT)
        );

        return $this->getResponse(null, Response::HTTP_NO_CONTENT);

    }

    /**
     * @param Product $product
     * @param ProductEnableVoteRequest $request
     *
     * @return JsonResponse
     */
    public function enableVote(
        Product $product,
        ProductEnableVoteRequest $request
    )
    {
        $this->repository->changeEnableVote(
            $product,
            $request->get(ProductInterface::ENABLE_VOTE)
        );

        return $this->getResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Product $product
     * @param ProductEnableReviewForBuyerRequest $request
     *
     * @return JsonResponse
     */
    public function enableReviewForBuyer(
        Product $product,
        ProductEnableReviewForBuyerRequest $request
    )
    {
        $this->repository->changeEnableReviewForBuyer(
            $product,
            $request->get(ProductInterface::ENABLE_REVIEW_FOR_BUYER)
        );

        return $this->getResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function clientProductList()
    {
        return ProductResource::collection(
            $this->repository->publishedList()
        );
    }

    /**
     * @param Product $product
     * @return ProductResource
     */
    public function clientProductShow(Product $product)
    {
        abort_if(!$product->getPublished(), 404);

        return new ProductResource($product);
    }
}
