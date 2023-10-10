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
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('id_project');
            $table->string('nama_project');
            $table->string('namapic_project')->default(null)->nullable();
            $table->string('nopic_project')->default(null)->nullable();
            $table->string('email_project')->default(null)->nullable();
            $table->string('alamat_project');
            $table->string('id_customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
