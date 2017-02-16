<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code');
            $table->string('name');
            $table->longtext('description');
            $table->string('brand');
            $table->string('price');
            $table->string('category');
            $table->string('subcategory');
            $table->string('length');
            $table->string('width');
            $table->string('depth');
            $table->string('weight');
            $table->string('material');
            $table->string('color');
            $table->string('assembly_required');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
