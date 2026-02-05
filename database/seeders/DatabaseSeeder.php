<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Units;
use App\Models\Categories;
use App\Models\Items;
use App\Models\ItemVariants;
use App\Models\Students;
use App\Models\Faculties;
use App\Models\Trainer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Units first (needed for Items and ItemVariants)
        Units::factory(5)->create();

        // Seed Categories (needed for Items and ItemVariants)
        Categories::factory(8)->create();

        // Seed Items (10 items)
        Items::factory(10)->create();

        // Seed ItemVariants with quantities for each item (3-5 variants per item with different statuses)
        // This creates the quantity/inventory for each item
        Items::all()->each(function ($item) {
            $quantity = rand(3, 8); // Create 3-8 variants per item
            ItemVariants::factory($quantity)->create([
                'item_id' => $item->id,
            ]);
        });

        // Seed Students (15 students)
        Students::factory(15)->create();

        // Seed Faculties (10 faculty members)
        Faculties::factory(10)->create();

        // Seed Trainers (5 trainers)
        Trainer::factory(5)->create();

        // Seed System Admin User
        User::factory()->create([
            'name' => env('SYS_USERNAME'),
            'email' => env('SYS_EMAIL'),
            'password' => env('SYS_PASSWORD'),
            'role' => env('SYS_ROLE'),
        ]);

        // Seed additional users (optional)
        User::factory(5)->create();
    }
}
