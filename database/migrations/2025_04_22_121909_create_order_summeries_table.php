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
        Schema::create('order_summeries', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('shipping_id');

            $table->string('payment_status')->default(0);

            $table->string('coupon_name')->nullable();
            $table->decimal('delivery_charge');

            $table->decimal('cart_total');
            $table->decimal('sub_total');
            $table->decimal('discount_total')->default(0);
            $table->decimal('total');

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_summeries');
    }
};
