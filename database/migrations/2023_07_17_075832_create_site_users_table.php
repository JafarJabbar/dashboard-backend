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
        Schema::create('site_users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title',128);
            $table->string('email',128);
            $table->string('phone',128);
            $table->string('username',128);
            $table->string('password',128);
            $table->string('avatar',128);
            $table->string('provider_id',128);
            $table->string('provider',64);
            $table->string('otp',8);
            $table->integer('used_bonuses');
            $table->integer('status_id');
            $table->dateTime('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_users');
    }
};
