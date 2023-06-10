<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkHour>
 */
class WorkHourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hours' => $this->faker->numberBetween(1, 12),
            'date' => $this->faker->unixTime(),
            'employee_id' => Employee::factory(),
            'status_id' => Status::factory()
        ];
    }
}
