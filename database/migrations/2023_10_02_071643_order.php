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
            $table->string('memo_order');
            $table->string('do_order');
            $table->string('spk_order');
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
