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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('sale_id')
            ->foreign('sale_id')
            ->references('id')
            ->on('sales')
            ->onDelete('cascade');
            $table->string('product_id')
            ->foreign('product_id')
            ->references('id')
            ->on('product_details')
            ->onDelete('cascade');
            $table->string('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
