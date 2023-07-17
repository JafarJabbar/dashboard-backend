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
        Schema::create('products_categories_pivot_attributes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('category_id');
            $table->integer('attribute_id');
            $table->integer('measurement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_categories_pivot_attributes');
    }
};
