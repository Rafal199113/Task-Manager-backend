<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PremissionsSeeder;
use Database\Seeders\ModuleSeeder;
use Database\Seeders\ModulePositionSeeder;
use Database\Seeders\ProjectStatusesSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PremissionsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ModuleSeeder::class,
            ModulePositionSeeder::class,
            ProjectStatusesSeeder::class,
        ]);
    }
}
