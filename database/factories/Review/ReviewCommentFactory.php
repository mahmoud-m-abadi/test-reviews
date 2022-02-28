<?php

namespace Database\Factories\Review;

use App\Interfaces\Models\ReviewCommentInterface;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            ReviewCommentInterface::USER_ID => User::factory()->create(),
            ReviewCommentInterface::PRODUCT_ID => Product::factory()->create(),
            ReviewCommentInterface::TITLE => $this->faker->title,
            ReviewCommentInterface::BODY => $this->faker->text,
            ReviewCommentInterface::APPROVED => $this->faker->boolean,
        ];
    }
}
