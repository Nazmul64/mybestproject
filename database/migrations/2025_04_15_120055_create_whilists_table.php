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
        Schema::create('whilists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('guest_id')->nullable();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('product_size');
            $table->string('product_color');

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('whilists');
    }
};
