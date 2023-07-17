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
        Schema::create('content_locales', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',128);
            $table->string('description',255);
            $table->text('content_body');
            $table->string('meta_title',128);
            $table->string('meta_description',255);
            $table->string('meta_keywords',255);
            $table->integer('locale_id');
            $table->integer('content_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_locales');
    }
};
