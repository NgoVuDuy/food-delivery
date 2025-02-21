<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'address' => fake()-> sentence(12),
            'status' => fake() -> word(3, true),
            'users_id' => fake() -> numberBetween(1, 10),
            'carts_id' => fake() -> numberBetween(1, 10)
        ];
    }
}
