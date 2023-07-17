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
        Schema::create('content', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('alias',128);
            $table->integer('position');
            $table->dateTime('date')->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('file_id');
            $table->integer('category_id');
            $table->integer('type_id');
            $table->integer('status_id');
            $table->integer('main_page_status_id');
            $table->integer('video_link');
            $table->integer('external_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
    }
};
