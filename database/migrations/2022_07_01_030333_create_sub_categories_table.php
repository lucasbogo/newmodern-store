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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            // IMPORTANTE! foreign key categoria definida aqui.
            $table->integer('category_id');
            $table->string('subcategory_name_en');
            $table->string('subcategory_name_pt');
            $table->string('subcategory_slug_en');
            $table->string('subcategory_slug_pt');
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
        Schema::dropIfExists('sub_categories');
    }
};
