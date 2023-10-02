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
        Schema::create('revisi', function (Blueprint $table) {
            $table->id();
            $table->string('id_revisi');
            $table->string('id_order');
            $table->string('id_technician');
            $table->string('do_orde');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisi');
    }
};
