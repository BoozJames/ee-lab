<?php

namespace Database\Factories;

use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentsFactory extends Factory
{
    protected $model = Students::class;

    public function definition()
    {
        $courseList = ['BS Computer Science', 'BS Information Technology', 'BS Engineering', 'BS Business Administration'];

        return [
            'srcode' => $this->faker->unique()->numerify('SR-#####'),
            'rfid_code' => $this->faker->unique()->numerify('RFID-############'),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'extra_name' => $this->faker->lastName(),
            'campus' => $this->faker->randomElement(['Main', 'South', 'North', 'East']),
            'colleges' => $this->faker->randomElement(['College of Engineering', 'College of Science', 'College of Arts']),
            'programs' => $this->faker->randomElement(['Full-time', 'Part-time', 'Online']),
            'courses' => array_map(function($course) { return ['name' => $course]; }, $this->faker->randomElements($courseList, 2)),
        ];
    }
}
