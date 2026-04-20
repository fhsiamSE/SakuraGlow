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
            $table->string('product_name')
            ->unique()
            ->notNullable();
            $table->string('category')
            ->notNullable();
            $table->text('description');
            $table->integer('price')
            ->nullable();
            $table->integer('quantity')
            ->nullable();
            $table->string('image')
            ->nullable();
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
