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
            $table->unsignedBigInteger('shipping_division_id'); // fk_shipping... Tentei seguir lógica correios sem integração
            $table->unsignedBigInteger('shipping_district_id'); // fk_shipping... tentei seguir lógica correios sem integração
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->string('shipping_street');
            $table->string('shipping_number');
            $table->string('shipping_hood'); // Bairro em gíria americana (estilo sútil meu)
            //$table->string('shipping_city');
            //$table->string('shipping_state');
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
