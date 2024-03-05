<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);
        return [
            'nip' => fake()->numerify('#############'),
            'name' => fake()->name($gender),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make(fake()->password()),
            'address' => fake()->address(),
            'gender' => $gender,
            'phone' => fake()->numerify('#############'),
        ];
    }
}
