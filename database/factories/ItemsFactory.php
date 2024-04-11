<?php

namespace Database\Factories;

use App\Models\Items;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Items::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            // 'unit_id' => mt_rand(1, 10), // assuming unit_id is an integer
            // 'category_id' => mt_rand(1, 10), // assuming category_id is an integer
            // 'image' => $this->faker->imageUrl(), // assuming image is a string field
        ];
    }
}
