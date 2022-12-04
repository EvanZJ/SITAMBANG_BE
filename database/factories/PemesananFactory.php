<?php

namespace Database\Factories;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemesanan>
 */
class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = User::pluck('id')->take(50)->toArray();
        $karyawan_id = Karyawan::pluck('id')->take(50)->toArray();

        return [
            'user_id' => fake()->randomElement($user_id),
            'karyawan_id' => fake()->randomElement($karyawan_id),
            'totalPembayaran' => rand(1,75)*1000,
            'caraPembayaran' => fake()->randomElement(['Tunai', 'Transfer Bank', 'e-Wallet']),
        ];
    }
}
