<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PremissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'users.create',
            'users.update',
            'users.edit',
            'users.view',
            'admin.view',
            'projects.create',
            'projects.update',
            'projects.edit',
            'projects.view',
            'tasks.create',
            'tasks.update',
            'tasks.edit',
            'tasks.view',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'api',
            ]);
        }
    }
}
