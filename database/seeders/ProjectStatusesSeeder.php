<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\ProjectStatusesSeeder;
use App\Models\Project\Statuses;

class ProjectStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
                 [
                    'ps_name' => 'Nowy',
                    'ps_slug' => 'new',
                ],

                [
                    'ps_name' => 'W przebiegu',
                    'ps_slug' => 'in_progress',
                ],

                [
                    'ps_name' => 'Zakończony',
                    'ps_slug' => 'completed',
                ],
            
        ];

        foreach ($statuses as $statusData) {
            Statuses::create($statusData);
        }
    }
}


