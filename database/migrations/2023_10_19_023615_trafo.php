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
            $table->string('id_trafo');
            $table->string('serial_number');
            $table->string('kva');
            $table->string('merk');
            $table->string('year');
            $table->string('voltage');
            $table->string('vg');
            $table->string('tag_number');
            $table->string('temperatur_oil');
            $table->string('volume_oil');
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
