<?php

namespace App\Repositories\Review;

use App\Base\BaseRepository;
use App\Events\Reviews\UserAddedReviewCommentEvent;
use App\Events\Reviews\UserReviewApprovedEvent;
use App\Http\Controllers\Controller;
use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Models\ReviewCommentInterface;
use App\Interfaces\Models\ReviewInterface;
use App\Models\Review\ReviewComment;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\DB;

class ReviewCommentRepository extends BaseRepository
{
    private UserRepository $userRepository;
    private ProductRepository $productRepository;

    public function __construct(
        Application $app,
        UserRepository $userRepository,
        ProductRepository $productRepository,
    )
    {
        parent::__construct($app);
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return ReviewComment::class;
    }

    /**
     * @param $data
     * @return array|BaseModelInterface
     */
    public function store($data): array|BaseModelInterface
    {
         DB::beginTransaction();

         try {
             $comment = $this->model::createObject(
                 $this->userRepository->find($data[ReviewCommentInterface::USER_ID]),
                 $this->productRepository->find($data[ReviewCommentInterface::PRODUCT_ID]),
                 $data[ReviewCommentInterface::TITLE],
                 $data[ReviewCommentInterface::BODY],
             );

             event(new UserAddedReviewCommentEvent($comment));
         } catch (\Exception $e) {
             DB::rollBack();

             return [
                 'errors' => true,
                 Controller::EXCEPTION_MESSAGE => $e->getMessage()
             ];
         }
         DB::commit();

        return $comment;
    }

    /**
     * @param ReviewInterface $review
     * @param bool $value Value.
     *
     * @return ReviewInterface
     */
    public function changeApprove(
        ReviewInterface $review,
        bool $value
    ): ReviewInterface
    {
        $review = $review->changeApprove($value);
        event(new UserReviewApprovedEvent($review));

        return $review;
    }
}
