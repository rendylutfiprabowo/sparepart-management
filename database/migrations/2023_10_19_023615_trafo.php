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
        Schema::create('trafo', function (Blueprint $table) {
            $table->id();
            $table->string('id_trafo')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('kva')->nullable();
            $table->string('merk')->nullable();
            $table->string('year')->nullable();
            $table->string('area')->nullable();
            $table->string('voltage')->nullable();
            $table->string('vg')->nullable();
            $table->string('tag_number')->nullable();
            $table->string('temperatur_oil')->nullable();
            $table->string('volume_oil')->nullable();
            $table->string('warna_oil')->nullable();
            $table->string('id_customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trafo');
    }
};
