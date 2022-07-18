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
        Schema::create('shipping_districts', function (Blueprint $table) {
            $table->id(); // pk_cidade
            $table->unsignedBigInteger('shipping_divisions_id'); // Fk id_bairro
            $table->string('shipping_district_name'); 
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
        Schema::dropIfExists('shipping_districts');
    }
};
