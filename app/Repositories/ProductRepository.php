<?php

namespace App\Repositories;

use App\Base\BaseRepository;
use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Models\ProductInterface;
use App\Interfaces\Models\ReviewCommentInterface;
use App\Models\Product;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductRepository extends BaseRepository
{
    private UserRepository $userRepository;
    private ProviderRepository $providerRepository;

    public function __construct(
        Application $app,
        UserRepository $userRepository,
        ProviderRepository $providerRepository,
    )
    {
        parent::__construct($app);
        $this->userRepository = $userRepository;
        $this->providerRepository = $providerRepository;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }

    /**
     * @param array $data Data.
     *
     * @return array|BaseModelInterface
     */
    public function store(array $data): array|BaseModelInterface
    {
        return $this->model::createObject(
            $this->userRepository->find($data[ProductInterface::CREATOR_ID]),
            $this->providerRepository->find($data[ProductInterface::PROVIDER_ID]),
            $data[ProductInterface::PUBLISHED],
            $data[ProductInterface::ENABLE_COMMENT],
            $data[ProductInterface::ENABLE_VOTE],
            $data[ProductInterface::ENABLE_REVIEW_FOR_BUYER],
            $data[ProductInterface::PRICE],
        );
    }

    /**
     * @param ProductInterface $product Product.
     * @param bool $value Value.
     *
     * @return ProductInterface
     */
    public function changePublished(ProductInterface $product, bool $value): ProductInterface
    {
        return $product->changePublished($value);
    }

    /**
     * @param ProductInterface $product Product.
     * @param bool $value Value.
     *
     * @return ProductInterface
     */
    public function enableComment(ProductInterface $product, bool $value): ProductInterface
    {
        return $product->changeEnableComment($value);
    }

    /**
     * @param ProductInterface $product Product.
     * @param bool $value Value.
     *
     * @return ProductInterface
     */
    public function changeEnableVote(ProductInterface $product, bool $value): ProductInterface
    {
        return $product->changeEnableVote($value);
    }

    /**
     * @param ProductInterface $product Product.
     * @param bool $value Value.
     *
     * @return ProductInterface
     */
    public function changeEnableReviewForBuyer(ProductInterface $product, bool $value): ProductInterface
    {
        return $product->changeEnableReviewForBuyer($value);
    }

    /**
     * @return mixed
     */
    public function publishedList()
    {
        return $this->model
            ->published()
            ->with([
                'approvedReviewVotes',
                'approvedReviewComments' => function (HasMany $approvedComments) {
                    return $approvedComments
                        ->orderByDesc(ReviewCommentInterface::ID)
                        ->limit(3);
                }
            ])
            ->withCount('approvedReviewComments')
            ->paginate();
    }
}
