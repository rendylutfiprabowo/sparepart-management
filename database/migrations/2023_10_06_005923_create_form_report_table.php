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
        Schema::create('form_report', function (Blueprint $table) {
            $table->id();
            $table->string('id_formreport');
            $table->json('field_formreport');
            $table->json('value_formreport');
            $table->string('id_solab');
            $table->string('id_lab');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_report');
    }
};
