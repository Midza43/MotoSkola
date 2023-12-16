<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kandidati>
 */
class KandidatiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imeprezime' => $this->faker->name(),
            'datumRodjenja' => $this->faker->dateTimeBetween('1990-01-01', '2005-12-31')->format('d/m/Y'),
            'kategorijaPolaganja' => $this->faker->randomElement(['AM','A1','A2','A']),
        ];
    }
}
