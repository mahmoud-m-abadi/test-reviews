<?php

namespace App\Repositories\Review;

use App\Base\BaseRepository;
use App\Events\Reviews\UserAddedReviewVoteEvent;
use App\Events\Reviews\UserReviewApprovedEvent;
use App\Http\Controllers\Controller;
use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Models\ReviewInterface;
use App\Interfaces\Models\ReviewVoteInterface;
use App\Models\Review\ReviewVote;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\DB;

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
     * @param array $data Data.
     *
     * @return array|BaseModelInterface
     */
    public function store(array $data): array|BaseModelInterface
    {
        DB::beginTransaction();

        try {
            $vote = $this->model::createObject(
                $this->userRepository->find($data[ReviewVoteInterface::USER_ID]),
                $this->productRepository->find($data[ReviewVoteInterface::PRODUCT_ID]),
                $data[ReviewVoteInterface::RATING],
            );

            event(new UserAddedReviewVoteEvent($vote));
        } catch (\Exception $e) {
            DB::rollBack();

            return [
                'errors' => true,
                Controller::EXCEPTION_MESSAGE => $e->getMessage()
            ];
        }
        DB::commit();

        return $vote;
    }

    /**
     * @param ReviewInterface $reviewVote Review Vote
     * @param bool $value Value.
     *
     * @return ReviewInterface
     */
    public function changeApprove(
        ReviewInterface $reviewVote,
        bool $value
    ): ReviewInterface
    {
        $review = $reviewVote->changeApprove($value);
        event(new UserReviewApprovedEvent($review));

        return $review;
    }
}
