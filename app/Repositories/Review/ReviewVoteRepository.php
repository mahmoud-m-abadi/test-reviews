<?php

namespace App\Repositories\Review;

use App\Base\BaseRepository;
use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Models\ReviewVoteInterface;
use App\Models\Review\ReviewVote;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Container\Container as Application;

class ReviewVoteRepository extends BaseRepository
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
        return ReviewVote::class;
    }

    /**
     * @param $data
     * @return BaseModelInterface
     */
    public function store($data): BaseModelInterface
    {
        return $this->model::createObject(
            $this->userRepository->find($data[ReviewVoteInterface::USER_ID]),
            $this->productRepository->find($data[ReviewVoteInterface::PRODUCT_ID]),
            $data[ReviewVoteInterface::RATING],
        );
    }

    /**
     * @param ReviewVoteInterface $reviewVote
     * @param bool $value Value.
     *
     * @return ReviewVoteInterface
     */
    public function changeApprove(ReviewVoteInterface $reviewVote, bool $value): ReviewVoteInterface
    {
        return $reviewVote->changeApprove($value);
    }
}
