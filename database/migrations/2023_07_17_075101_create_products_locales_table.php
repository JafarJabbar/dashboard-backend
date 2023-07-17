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
        Schema::create('products_locale', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',128);
            $table->string('description',255)->nullable();
            $table->text('content_body');
            $table->integer('locale_id');
            $table->integer('product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_locale');
    }
};
