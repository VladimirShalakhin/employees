<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\WorkHour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PayDay>
 */
class PayDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $workHour =  WorkHour::factory()->create();
        return [
            'employee_id' => Employee::factory(),
            'date' => $workHour['date']
        ];
    }
}
