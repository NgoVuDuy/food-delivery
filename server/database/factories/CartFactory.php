<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'quantity' => fake()->numberBetween(1,5),
            'total_price' => fake() ->  numberBetween(100000, 500000),
            'product_option_id' => fake() -> numberBetween(1,10),
            'users_id' => fake() -> numberBetween(1, 10)

        ];
    }
}
