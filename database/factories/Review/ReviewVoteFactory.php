<?php

namespace Database\Factories\Review;

use App\Interfaces\Models\ReviewVoteInterface;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewVoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            ReviewVoteInterface::USER_ID => User::factory()->create(),
            ReviewVoteInterface::PRODUCT_ID => Product::factory()->create(),
            ReviewVoteInterface::RATING => $this->faker->numberBetween(1,5),
            ReviewVoteInterface::APPROVED => $this->faker->boolean,
        ];
    }
}
