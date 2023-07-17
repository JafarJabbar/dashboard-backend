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
        Schema::create('FAQ_locales', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('question',255);
            $table->string('answer',255);
            $table->integer('locale_id');
            $table->integer('faq_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('FAQ_locales');
    }
};
