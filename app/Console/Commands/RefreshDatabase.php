<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshDatabase extends Command
{
    protected $signature = 'refresh:db';
    protected $description = 'Wipe the database, run migrations, and seed the database';

    public function handle()
    {
        $this->info('Wiping the database...');
        Artisan::call('db:wipe');
        $this->info('Database wiped successfully.');

        $this->info('Running migrations...');
        Artisan::call('migrate');
        $this->info('Migrations completed successfully.');

        $this->info('Seeding the database...');
        Artisan::call('db:seed');
        $this->info('Database seeded successfully.');
    }
}
