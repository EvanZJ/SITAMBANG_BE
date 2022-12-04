<?php

namespace Database\Factories;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\riwayat>
 */
class RiwayatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $p_id = Pemesanan::pluck('id')->take(50)->toArray();
        $total = Pemesanan::pluck('totalPembayaran')->take(50)->toArray();
        return [
            'pemesanan_id' => fake()->randomElement($p_id),
            'date' => fake()->date(),
            'total' => fake()->randomElement($total),
            'bukti_path' => fake()->text(100),
        ];
    }
}
