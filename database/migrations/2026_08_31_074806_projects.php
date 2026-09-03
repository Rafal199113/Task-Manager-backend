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
        DB::statement('
			CREATE TABLE projects (
				id_project      SERIAL NOT NULL,
                id_owner	       INTEGER NOT NULL,
                id_lead          INTEGER NOT NULL,
                id_project_statuses INTEGER NOT NULL,
                p_name			CHARACTER VARYING(100) NOT NULL,
                p_repository    CHARACTER VARYING(255),
                p_key			CHARACTER VARYING(100) NOT NULL,
                p_description	CHARACTER VARYING(255),
                p_start_date      TIMESTAMP WITH TIME ZONE DEFAULT NOW(),
                p_end_date        TIMESTAMP WITH TIME ZONE,
                p_priority        CHARACTER VARYING(100),
                created_at      TIMESTAMP WITH TIME ZONE NOT NULL,
                updated_at      TIMESTAMP WITH TIME ZONE NOT NULL,
                PRIMARY KEY (id_project)
			)
		');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE projects');
    }
};
