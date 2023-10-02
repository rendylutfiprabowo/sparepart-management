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
        Schema::create('distribution', function (Blueprint $table) {
            $table->id();
            $table->string('id_distribution');
            $table->string('id_stock');
            $table->integer('qty_distribution');
            $table->date('order_date');
            $table->date('recieved_date');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution');
    }
};
