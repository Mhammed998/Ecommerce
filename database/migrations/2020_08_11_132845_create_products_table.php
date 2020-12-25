<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('main_image');
            $table->string('sub_images');
            $table->string('name_en');
            $table->string('description_en');
            $table->string('name_ar');
            $table->string('description_ar');
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('status');
            $table->string('brand');
            $table->string('colors');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('size');
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
}
