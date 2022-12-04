<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AlatTambak>
 */
class AlatTambakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(['Aerator', 'DO Meter', 'PH Meter']),
            'kondisi' => fake()->randomElement(['Normal', 'Performa Tinggi', 'Kurang Baik']),
        ];
    }
}
