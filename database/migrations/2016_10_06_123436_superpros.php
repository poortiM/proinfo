<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Superpros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('superpros', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('position');
             $table->string('company_name');
             $table->string('category');
             $table->string('mobile_number');
             $table->string('email');
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
         Schema::drop('superpros');
     }
}
