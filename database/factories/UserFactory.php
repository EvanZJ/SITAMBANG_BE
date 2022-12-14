<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'no_telp' => fake()->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => '$2y$10$Bl9PnTzalZDOVjZ3bKVWm.Rwyc4VGQq1KWSHS.zaUKx/2VVivofkW', // password
            'remember_token' => Str::random(10),
            'alamat' => fake()->address(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
