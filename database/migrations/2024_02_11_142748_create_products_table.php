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
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('sub_subcategory_id')->nullable();
            $table->string('product_name_en')->nullable();
            $table->string('product_name_hin')->nullable();
            $table->string('product_slug_en')->nullable();
            $table->string('product_slug_hin')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_tags_en')->nullable();
            $table->string('product_tags_hin')->nullable();
            $table->string('product_size_en')->nullable();
            $table->string('product_size_hin')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_hin')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('product_short_desc_en')->nullable();
            $table->string('product_short_desc_hin')->nullable();
            $table->longText('product_long_desc_en')->nullable();
            $table->longText('product_long_desc_hin')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->char('hot_deals', 1)->comment('0:no,1:yes')->default(0);
            $table->char('featured', 1)->comment('0:no,1:yes')->default(0);
            $table->char('special_offer', 1)->comment('0:no,1:yes')->default(0);
            $table->char('special_deals', 1)->comment('0:no,1:yes')->default(0);
            $table->char('status', 1)->comment('1:active,2:de-active')->default(1);
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
