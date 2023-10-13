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
        Schema::create('booked', function (Blueprint $table) {
            $table->id();
            $table->string('id_booked');
            $table->string('id_stock');
            $table->string('id_order')->nullable();
            $table->string('id_revisi')->nullable();
            $table->integer('qty_booked');
            $table->string('status_booked');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked');
    }
};
