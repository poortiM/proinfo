<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectTimeSpent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {
         Schema::create('project_time_spent', function (Blueprint $table) {
             $table->increments('id');
             $table->string('ip');
             $table->integer('project_id')->unsigned();
             $table->integer('time');
             $table->timestamps();

             $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
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
         Schema::drop('project_time_spent');
     }
}
