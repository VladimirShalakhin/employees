<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$email = $this->faker->email();
        //$password = Hash::make($this->faker->password());
        return [
            'email' => $this->faker->email(),
            'password' => Hash::make($this->faker->password())
        ];
    }
}
