<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('image');
            $table->string('refine_image');
            $table->integer('show_on_page');
            $table->integer('section');
            $table->integer('priority');
            $table->integer('popular_section');
            $table->integer('professional_section');
            $table->integer('find_professional');
            $table->integer('row_priority');
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
        Schema::drop('categories');
    }
}
