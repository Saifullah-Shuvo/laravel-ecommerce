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
            $table->id();
            $table->integer('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('order_notes')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('coupon_code')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total')->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('order_date')->nullable();
            $table->timestamp('order_month')->nullable();
            $table->timestamp('order_year')->nullable();
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
