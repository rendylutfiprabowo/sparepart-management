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
        Schema::create('technician', function (Blueprint $table) {
            $table->id();
            $table->string('id_technician');
            $table->string('nama_technician');
            $table->string('phone_technician');
            $table->string('nip_technician');
            $table->string('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technician');
    }
};
