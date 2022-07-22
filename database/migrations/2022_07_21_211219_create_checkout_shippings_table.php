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
        Schema::create('checkout_shippings', function (Blueprint $table) {
            $table->id(); // pk checkout_shippipng
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('shipping_division_id'); // fk_shipping...
            $table->unsignedBigInteger('shipping_district_id'); // fk_shipping...
            $table->unsignedBigInteger('shipping_state_id'); // fk_shipping...
            $table->string('checkout_shipping_name');
            $table->string('checkout_shipping_email');
            $table->string('checkout_shipping_phone');
            $table->integer('checkout_postal_code');
            $table->text('checkout_shipping_notes');
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
        Schema::dropIfExists('checkout_shippings');
    }
};
