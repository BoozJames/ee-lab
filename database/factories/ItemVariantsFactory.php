<?php

namespace Database\Factories;

use App\Models\ItemVariants;
use App\Models\Items;
use App\Models\Units;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemVariantsFactory extends Factory
{
    protected $model = ItemVariants::class;

    public function definition()
    {
        $statuses = ['available', 'in_use', 'maintenance', 'damaged'];

        return [
            'item_id' => Items::factory(),
            'brand' => $this->faker->company(),
            'variant_description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement($statuses),
            'unit_id' => Units::inRandomOrder()->first()?->id ?? Units::factory(),
            'category_id' => Categories::inRandomOrder()->first()?->id ?? Categories::factory(),
            'equipment_label' => $this->faker->bothify('EQ-####-??'),
            'serial_number' => $this->faker->unique()->bothify('SN-####-######'),
            'last_calibration_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
