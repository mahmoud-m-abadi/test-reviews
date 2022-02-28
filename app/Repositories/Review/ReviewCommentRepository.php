<?php

namespace App\Repositories\Review;

use App\Base\BaseRepository;
use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Models\ReviewCommentInterface;
use App\Models\Review\ReviewComment;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Container\Container as Application;

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
     * @return BaseModelInterface
     */
    public function store($data): BaseModelInterface
    {
        return $this->model::createObject(
            $this->userRepository->find($data[ReviewCommentInterface::USER_ID]),
            $this->productRepository->find($data[ReviewCommentInterface::PRODUCT_ID]),
            $data[ReviewCommentInterface::TITLE],
            $data[ReviewCommentInterface::BODY],
        );
    }

    /**
     * @param ReviewComment $reviewComment
     * @param bool $value Value.
     *
     * @return ReviewCommentInterface
     */
    public function changeApprove(
        ReviewComment $reviewComment,
        bool $value
    ): ReviewCommentInterface
    {
        return $reviewComment->changeApprove($value);
    }
}
