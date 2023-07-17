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
        Schema::create('content_types', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('type',64);
            $table->string('icon',64);
            $table->integer('page_id');
            $table->tinyInteger('with_thumbnail')->default(1);
            $table->tinyInteger('with_gallery')->default(0);
            $table->tinyInteger('with_info_blocks')->default(0);
            $table->tinyInteger('with_page_blocks')->default(0);
            $table->tinyInteger('with_meta')->default(0);
            $table->tinyInteger('with_content_body')->default(1);
            $table->tinyInteger('is_static')->default(1);
            $table->tinyInteger('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_types');
    }
};
