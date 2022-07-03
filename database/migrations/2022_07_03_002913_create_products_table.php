<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_pt');
            $table->string('product_slug_en');
            $table->string('product_slug_pt');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_pt');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_pt')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_pt');
            $table->string('product_selling_price');
            $table->string('product_discount_price')->nullable();
            $table->string('product_short_description_en');
            $table->string('product_short_description_pt');
            $table->string('product_long_description_en');
            $table->string('product_long_description_pt');
            $table->string('product_thumbnail');
            $table->integer('product_hot_deals')->nullable();
            $table->integer('product_featured')->nullable();
            $table->integer('product_special_offer')->nullable();
            $table->integer('product_special_deals')->nullable();
            $table->integer('product_status')->default(0);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
