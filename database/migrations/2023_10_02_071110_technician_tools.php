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
        Schema::create('technician_tools', function (Blueprint $table) {
            $table->id();
            $table->string('id_technician_tools');
            $table->string('id_tools');
            $table->string('id_technician');
            $table->integer('qty_technician_tools');
            $table->date('start_date');
            $table->date('finish_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technician_tools');
    }
};
