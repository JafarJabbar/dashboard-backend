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
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('svg_icon',255)->nullable();
            $table->string('alias',128)->nullable();
            $table->integer('position');
            $table->integer('parent_id')->nullable();
            $table->integer('file_id')->nullable();
            $table->integer('status_id');
            $table->integer('main_page_status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
