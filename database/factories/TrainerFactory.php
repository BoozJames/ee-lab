<?php

namespace Database\Factories;

use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    protected $model = Trainer::class;

    public function definition()
    {
        return [
            'trainer_name' => $this->faker->name(),
            'array_item_ids' => [],
            'array_qty' => [],
        ];
    }
}
