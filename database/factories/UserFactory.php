<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->unique()->safeEmail,
            'rank_id' => fake()->numberBetween(1, 5),
            'unit_id' => fake()->numberBetween(1, 5),
            'position_id' => fake()->numberBetween(1, 5),
            'email' => fake()->unique()->safeEmail(),
            'police_id' => Str::random(6),
            'username' => fake()->userName,
            'age' => fake()->numberBetween(19, 99),
            'gender' => fake()->randomElement(['Male', 'Female', 'Not selected']),
            'year_attended' => fake()->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d'),
            'contact_number' => "09123456789",
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
