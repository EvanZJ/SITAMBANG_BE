<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(['Udang', 'Lobster', 'Kepiting']),
            'description' => fake()->text(),
            'harga' => rand(1,5)*10000,
            'total_persediaan' => rand(1,99),
        ];
    }
}
