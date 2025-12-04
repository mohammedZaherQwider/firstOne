<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = [];
        $services[] = 0;

        for ($i = 1; $i <= 7; $i++) {
            $services[] = [
                'name' => $this->faker->word(),
                'img' => $this->faker->word(),
                'type' => $this->faker->randomElement(['in', 'out'])
            ];
            $services[] = $i;
        }
        return [
            'name' => $this->faker->company(),
            'country_id' => 1,
            'city_id' => 1,
            'bed_number' => $this->faker->numberBetween(10, 500),
            'services' =>$services,
            'description' => $this->faker->sentence(12),
        ];
    }
}
