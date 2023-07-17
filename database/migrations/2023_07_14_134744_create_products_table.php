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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('sku',16);
            $table->string('alias',128);
            $table->integer('price');
            $table->integer('file_id');
            $table->integer('sale_price');
            $table->dateTime('date')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('video_link')->nullable();
            $table->string('external_link')->nullable();
            $table->tinyInteger('status_id');
            $table->tinyInteger('stock_status_id');
            $table->integer('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
