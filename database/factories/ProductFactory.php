<?php

namespace Database\Factories;

use App\Interfaces\Models\ProductInterface;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            ProductInterface::PROVIDER_ID => Provider::factory()->create(),
            ProductInterface::CREATOR_ID => User::factory()->create(),
            ProductInterface::NAME => $this->faker->name,
            ProductInterface::PUBLISHED => $this->faker->boolean,
            ProductInterface::ENABLE_COMMENT => $this->faker->boolean,
            ProductInterface::ENABLE_VOTE => $this->faker->boolean,
            ProductInterface::ENABLE_REVIEW_FOR_BUYER => $this->faker->boolean,
            ProductInterface::PRICE => $this->faker->numberBetween(1000,50000),
        ];
    }
}
