<?php

namespace Database\Factories;

use App\Models\AlatTambak;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bertanggungjawab>
 */
class BertanggungjawabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $k_id = Karyawan::pluck('id')->take(15)->toArray();
        $a_id = AlatTambak::pluck('id')->take(10)->toArray();
        return [
            'karyawan_id' => fake()->randomElement($k_id),
            'alat_tambak_id' => fake()->randomElement($a_id),
        ];
    }
}
