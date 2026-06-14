<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'label' => 'Administrator', 'guard_name' => 'api'],
            ['name' => 'user', 'label' => 'Użytkownik', 'guard_name' => 'api']
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }
    }
}

