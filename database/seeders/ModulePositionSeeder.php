<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO module_position (id_module, module_position_name, module_position_code) VALUES (2, 'Uprawnienia', 'premissions')");
    }
}

