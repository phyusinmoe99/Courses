<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>rand(1,5),
            'course_id'=>rand(1,6),
            'seat_number'=>rand(1,20),
            'transfer_name'=>fake()->name(),
            'payment_validator'=>rand(0,1),
            'phone_number'=>fake()->phoneNumber(),
        ];
    }
}
