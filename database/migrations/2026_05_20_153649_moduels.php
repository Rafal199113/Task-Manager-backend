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
        Schema::create('module', static function (Blueprint $table) {
            $table->id('id_module');
            $table->integer('m_position')->nullable();
            $table->string('m_name');
            $table->string('m_code');
            $table->string('m_icon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP TABLE module');
    }
};
