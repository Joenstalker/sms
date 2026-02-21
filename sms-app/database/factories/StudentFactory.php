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
            'student_lrn' => $this->faker->numerify('260110####'), // 10 digits
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(19, 30),
            'year_level' => $this->faker->randomElement([
                '1st Year',
                '2nd Year',
                '3rd Year',
                '4th Year'
            ]),
            'section' => $this->faker->randomElement([
                'T110',
                'T120',
                'T130',
                'T140',
                'T150',
                'T160',
                'T170',
                'T180',
                'T190',
                'T100',
                'T210'
            ]),
        ];
    }
}