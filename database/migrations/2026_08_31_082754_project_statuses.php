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
			CREATE TABLE project_statuses (
				id_project_statuses     SERIAL NOT NULL,
                id_project	            INTEGER,
                ps_name                 CHARACTER VARYING(100) NOT NULL,
                ps_slug			        CHARACTER VARYING(100) NOT NULL,
                ps_color                CHARACTER VARYING(50),
                created_at              TIMESTAMP WITH TIME ZONE NOT NULL,
                updated_at              TIMESTAMP WITH TIME ZONE NOT NULL,
                PRIMARY KEY (id_project_statuses)
			)
		');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('
			DROP TABLE project_statuses
		');
    }
};
