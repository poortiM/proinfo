<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Follows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('following_id')->unsigned();
            $table->integer('follower_id')->unsigned();
            
            $table->timestamps();

            $table->foreign('follower_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('following_id')
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
        Schema::drop('follows');
    }
}
