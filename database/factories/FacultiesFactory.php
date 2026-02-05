<?php

namespace Database\Factories;

use App\Models\Faculties;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacultiesFactory extends Factory
{
    protected $model = Faculties::class;

    public function definition()
    {
        $prefixes = ['Dr.', 'Prof.', 'Mr.', 'Ms.', 'Mrs.', 'Eng.'];

        return [
            'emp_code' => $this->faker->unique()->numerify('EMP-#####'),
            'prefix_name' => $this->faker->randomElement($prefixes),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'extra_name' => $this->faker->lastName(),
            'college' => $this->faker->randomElement(['College of Engineering', 'College of Science', 'College of Arts', 'College of Business']),
        ];
    }
}
