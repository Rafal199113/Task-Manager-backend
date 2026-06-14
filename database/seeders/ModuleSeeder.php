<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO module (m_position, m_name, m_code, m_icon) VALUES (1, 'Użytkownicy', 'users', 'faUsers')");
        DB::statement("INSERT INTO module (m_position, m_name, m_code, m_icon) VALUES (2, 'Administracja', 'admin', 'faScrewdriverWrench')");
        DB::statement("INSERT INTO module (m_position, m_name, m_code, m_icon) VALUES (3, 'Projekty', 'projects', 'faLayerGroup')");
        DB::statement("INSERT INTO module (m_position, m_name, m_code, m_icon) VALUES (4, 'Zadania', 'tasks', 'faCheck')");
    }
}

