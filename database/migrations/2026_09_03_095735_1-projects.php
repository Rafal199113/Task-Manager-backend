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
			ALTER TABLE users ADD COLUMN active BOOLEAN DEFAULT TRUE
		');

        DB::statement("
			INSERT INTO permissions (name, guard_name, created_at, updated_at) VALUES ('projects.delete', 'api', NOW(), NOW())
		");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('
			ALTER TABLE users DROP COLUMN active
		');

         DB::statement("
			DELETE FROM permissions WHERE name = 'projects.delete'
		");
    }
};
