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
			CREATE TABLE users (
				id_user         SERIAL NOT NULL,
                name			CHARACTER VARYING(100) NOT NULL,
                surname			CHARACTER VARYING(100) NOT NULL,
                email			CHARACTER VARYING(255) NOT NULL,
                created_at      TIMESTAMP WITH TIME ZONE NOT NULL,
                updated_at      TIMESTAMP WITH TIME ZONE NOT NULL,
                password	    CHARACTER VARYING(255) NOT NULL,
                PRIMARY KEY (id_user)
			)
		');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE user');
    }
};
