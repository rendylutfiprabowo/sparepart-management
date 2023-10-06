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
        Schema::create('solab', function (Blueprint $table) {
            $table->id();
            $table->string('no_so_solab');
            $table->string('no_spk_solab');
            $table->string('alamat_solab');
            $table->string('tahun_solab');
            $table->string('id_project');
            $table->string('id_sales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solab');
    }
};