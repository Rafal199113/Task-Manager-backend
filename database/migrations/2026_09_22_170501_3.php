<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
			INSERT INTO module (m_position, m_name, m_code, m_icon) VALUES (5, 'Ustawienia', 'settings', 'faGear'); 
		");

        DB::statement('
			CREATE TABLE settings (
				id_settings             SERIAL NOT NULL,
                id_user	                INTEGER NOT NULL,
                id_setting_position        INTEGER NOT NULL,
                setting_short_name      CHARACTER VARYING(50) NOT NULL,
                setting_value           CHARACTER VARYING(100),
                created_at              TIMESTAMP WITH TIME ZONE NOT NULL,
                updated_at              TIMESTAMP WITH TIME ZONE NOT NULL,

                PRIMARY KEY (id_settings),
                UNIQUE (id_user, id_setting_position)
            
			)
		');

         DB::statement('
			CREATE TABLE settings_positions (
				id_settings_positions           SERIAL NOT NULL,
                settings_positions_position	    INTEGER NOT NULL,
                settings_positions_key	        CHARACTER VARYING(100) NOT NULL,
                settings_positions_value        CHARACTER VARYING(100) NOT NULL,
                created_at                      TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW(),
                updated_at                      TIMESTAMP WITH TIME ZONE NOT NULL DEFAULT NOW(),

                PRIMARY KEY (id_settings_positions) 
			)
		');

        DB::statement("
			INSERT INTO settings_positions (settings_positions_position, settings_positions_key, settings_positions_value) VALUES (1, 'GitChub token', ''); 
		");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
			DELETE from module where m_code = 'settings';
		");

        DB::statement("
			DROP TABLE settings;
		");

        DB::statement("
			DROP TABLE settings_positions;
		");
    }
};
