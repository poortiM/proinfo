<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userscrapbooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userscrapbooks', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('scrapbook_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->longtext('comment');
            $table->timestamps();

            $table->foreign('image_id')
                  ->references('id')
                  ->on('blog_images')
                  ->onDelete('cascade');

            $table->foreign('scrapbook_id')
                  ->references('id')
                  ->on('scrapbooks')
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
        Schema::drop('userscrapbooks');
    }
}
