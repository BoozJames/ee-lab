<?php

namespace Database\Factories;

use App\Models\Units;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitsFactory extends Factory
{
    protected $model = Units::class;

    public function definition()
    {
        $unitTypes = ['piece', 'set', 'box', 'pack', 'unit', 'meter', 'kilogram', 'liter'];

        return [
            'name' => $this->faker->randomElement($unitTypes),
        ];
    }
}
