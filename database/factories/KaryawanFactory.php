<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => fake()->address(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->dateTimeBetween('1990-01-01', '2004-12-31'),
            'jabatan' => fake()->randomElement(['Staff', 'Koordinator', 'Sekretaris', 'Bendahara']),
            'no_telp' => fake()->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function admin()
    {
        return $this->state(fn (array $attributes) => [
            'is_admin' => true,
        ]);
    }

    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
