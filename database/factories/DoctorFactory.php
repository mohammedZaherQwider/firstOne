<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'specialization_id' => 1,
            'nationality_id' => 1,
            'hospital_id' => 1,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'bio' => $this->faker->sentence(12),
        ];
    }
}
