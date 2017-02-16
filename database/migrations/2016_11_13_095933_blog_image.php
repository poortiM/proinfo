<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('image_description');
            $table->integer('blog_id')->unsigned();
            $table->timestamps();

            $table->foreign('blog_id')
                  ->references('id')
                  ->on('blogs')
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
        Schema::drop('blog_images');
    }
}
