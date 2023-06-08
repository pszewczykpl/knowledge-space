<?php

namespace Database\Factories;

use App\Enums\ProductKind;
use App\Enums\ProductPremiumType;
use App\Enums\ProductType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code_toil' => fake()->word(),
            'group_code' => fake()->word(),
            'group_name' => fake()->word(),
            'name' => fake()->word(),
            'code' => fake()->word(),
            'code_owu' => fake()->word(),
            'is_subscriptions' => true,
            'subscription_code' => fake()->word(),
            'subscription_status' => fake()->word(),
            'subscription_date_from' => fake()->date(),
            'subscription_date_to' => fake()->date(),
            'kind' => fake()->randomElement(ProductKind::list()),
            'type' => fake()->randomElement(ProductType::list()),
            'partner_name' => fake()->word(),
            'partner_code' => fake()->word(),
            'insurer_min_age' => fake()->numberBetween(18, 99),
            'insurer_max_age' => fake()->numberBetween(18, 99),
            'insured_min_age' => fake()->numberBetween(18, 99),
            'insured_max_age' => fake()->numberBetween(18, 99),
            'period_of_insurance' => fake()->numberBetween(24, 48),
            'premium_type' => fake()->randomElement(ProductPremiumType::list()),
            'system_status' => fake()->word(),
            'system_name' => fake()->word(),
            'published_at' => fake()->date(),
            'is_archived' => fake()->boolean(),
        ];
    }

    /**
     * Indicate that Product is not subscription.
     *
     * @return static
     */
    public function withoutSubscription(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'is_subscriptions' => false,
                'subscription_code' => null,
                'subscription_status' => null,
                'subscription_date_from' => null,
                'subscription_date_to' => null,
            ];
        });
    }
}
