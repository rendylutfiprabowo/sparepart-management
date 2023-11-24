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
        Schema::create('sample', function (Blueprint $table) {
            $table->id();
            $table->string('id_sample');
            $table->string('jumlah_sample')->nullable();
            $table->string('status_sample');
            $table->date('tanggal_sampling')->nullable();
            $table->date('tanggal_kedatangan')->nullable();
            $table->date('tanggal_pengujian')->nullable();
            $table->string('id_scope');
            $table->string('id_history');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample');
    }
};
