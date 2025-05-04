<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->randomElement(['PHP Developer', 'Java Developer', 'Laravel Developer', 'Full Stack Developer', 'Backend Developer', 'Scrum Master', 'Front End Developer', 'Swift Developer']),
            'salary' => $this->faker->randomElement(['€25,000 ', '€35,000', '€50,000', '€64,000']),
            'location' => 'Remote',
            'Schedule' => $this->faker->randomElement(['Full Time', 'Part Time', 'Temporary']),
            'url' => $this->faker->url(),
            'featured' => $this->faker->boolean(),
        ];
    }
}
