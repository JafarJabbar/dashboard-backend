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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('order_id');
            $table->string('address',255);
            $table->integer('city_id');
            $table->integer('user_id');
            $table->string('full_name',128);
            $table->string('email',128);
            $table->string('phone',128);
            $table->integer('payment_type_id');
            $table->integer('payment_status_id');
            $table->integer('seen_by_user_id');
            $table->integer('order_status_id');
            $table->string('note',255);
            $table->integer('used_bonuses');
            $table->integer('total_price');
            $table->integer('delivery_fee');
            $table->integer('total_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
