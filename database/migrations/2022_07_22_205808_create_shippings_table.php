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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id(); // pk checkout_shippipng
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('shipping_division_id'); // fk_shipping...
            $table->unsignedBigInteger('shipping_district_id'); // fk_shipping...
            $table->unsignedBigInteger('shipping_state_id'); // fk_shipping...
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->integer('postal_code');
            $table->text('notes');
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
        Schema::dropIfExists('shippings');
    }
};
