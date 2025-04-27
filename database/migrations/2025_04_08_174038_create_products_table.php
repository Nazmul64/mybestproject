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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('product_name')->nullable();
            $table->string('slug')->nullable();
            $table->text('product_description')->nullable();
            $table->longText('product_details_description')->nullable();
            $table->text('product_slug')->nullable();

            $table->decimal('regular_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable(); // Keep only this one

            $table->string('video_url')->nullable();
            $table->integer('stock')->nullable();
            $table->text('size_description')->nullable();
            $table->longText('color_text')->nullable();



            $table->longText('photo')->nullable();
            $table->longText('gallery_image')->nullable();
            $table->boolean('is_advertise')->default(1);
            $table->decimal('discount_percentage', 5, 2)->nullable();
            
            $table->integer('status')->default(1);
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->nullable()->constrained('sub_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
