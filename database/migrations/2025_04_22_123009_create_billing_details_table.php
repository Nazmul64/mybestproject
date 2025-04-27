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
        Schema::create('billing_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_summery_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_area');
            $table->text('customer_address');
            $table->string('customer_phone');
            $table->text('customer_note')->nullable();
            $table->date('order_date')->nullable(); 
    
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('guest_id')->nullable(); 
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_details');
    }
};
