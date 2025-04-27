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
        Schema::create('shippingmethods', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('type')->comment('Shipping method type, e.g., Standard, Express');
            $table->unsignedInteger('shipping_cost')->comment('Cost of the shipping method in currency');
            $table->boolean('is_active')->default(1)->comment('Status to determine if the shipping method is active');
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippingmethods');
    }
};
