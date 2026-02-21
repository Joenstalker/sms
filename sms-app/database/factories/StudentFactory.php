<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_lrn' => $this->faker->numerify('############'), // 12 digits
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(14, 20),
            'year_level' => $this->faker->randomElement([
                'Grade 7',
                'Grade 8',
                'Grade 9',
                'Grade 10',
                'Grade 11',
                'Grade 12'
            ]),
            'section' => $this->faker->randomElement([
                'Diamond',
                'Emerald',
                'Ruby',
                'Sapphire',
                'Topaz'
            ]),
        ];
    }
}