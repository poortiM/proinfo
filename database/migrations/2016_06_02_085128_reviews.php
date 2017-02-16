<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('efficiency');
            $table->integer('quality');
            $table->integer('helpfulness');
            $table->integer('effectiveness');
            $table->integer('experience');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longText('description');
            $table->integer('user_id')->unsigned();
            $table->enum('status',[0,1]);
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
        Schema::drop('reviews');
    }
}
