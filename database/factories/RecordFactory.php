<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d'),
            'time' => fake()->time(),
            'note' => fake()->sentence(),
            'hidden' => false,
            'client_id' => fake()->numberBetween(1, 30),
            'price_id' => fake()->numberBetween(1, 5),
        ];
    }
}
