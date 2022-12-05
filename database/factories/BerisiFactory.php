<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\berisi>
 */
class BerisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pemesanan_id' => fake()->randomElement(Pemesanan::pluck('id')->take(1000)->toArray()),
            'stock_id' => fake()->randomElement(Stock::pluck('id')->take(20)->toArray()),
            'kuantitas' => rand(1,10),
        ];
    }
}
