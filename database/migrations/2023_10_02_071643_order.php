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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('id_order');
            $table->string('id_customer');
            $table->string('id_store');
            $table->string('id_sales');
            $table->string('jenis_layanan');
            $table->string('id_technician')->nullable();
            $table->string('nota_penyerahan')->nullable();
            $table->string('surat_jalan')->nullable();
            $table->string('memo_order')->nullable();
            $table->string('do_order')->nullable();
            $table->string('spk_order')->nullable();
            $table->string('status')->nullable();
            $table->date('date_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
