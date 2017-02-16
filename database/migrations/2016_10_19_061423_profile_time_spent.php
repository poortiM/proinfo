<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfileTimeSpent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
         Schema::create('profile_time_spent', function (Blueprint $table) {
             $table->increments('id');
             $table->string('ip');
             $table->integer('user_id')->unsigned();
             $table->integer('time');
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
         Schema::drop('profile_time_spent');
     }
}
