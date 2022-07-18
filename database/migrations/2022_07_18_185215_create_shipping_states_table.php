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
        Schema::create('shipping_states', function (Blueprint $table) {
            $table->id(); //pk
            $table->unsignedBigInteger('shipping_division_id'); // fk id_bairro
            $table->unsignedBigInteger('shipping_district_id'); // fk id_cidade
            $table->string('shipping_state_name'); 
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
        Schema::dropIfExists('shipping_states');
    }
};
