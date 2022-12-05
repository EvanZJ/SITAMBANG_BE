<?php

namespace Database\Factories;

use App\Models\Karyawan;
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
        $karyawan_id = Karyawan::pluck('id')->take(50)->toArray();
        return [
            'name' => fake()->randomElement(['Aerator', 'DO Meter', 'PH Meter']),
            'karyawan_id' => fake()->randomElement($karyawan_id),
            'kondisi' => fake()->randomElement(['Normal', 'Performa Tinggi', 'Kurang Baik']),
        ];
    }
}
