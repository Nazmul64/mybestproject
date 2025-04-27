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
        Schema::create('incompleate_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('guest_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->text('customer_address')->nullable();
            $table->unsignedBigInteger('shipping_id')->nullable();
            $table->text('note')->nullable();

            $table->double('subtotal')->default(0);
            $table->double('total_price')->default(0);
            $table->double('shipping_charge')->default(0);
            $table->double('coupon_discount')->default(0);
            $table->string('coupon_name')->nullable();

            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();

            $table->index(['user_id']);
            $table->index(['guest_id']);
            $table->index(['shipping_id']);

            $table->timestamps();

            // Optional foreign keys
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('shipping_id')->references('id')->on('shipping')->onDelete('set null');
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incompleate_orders');
    }
};
