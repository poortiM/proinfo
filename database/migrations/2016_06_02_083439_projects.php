<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cost');
            $table->string('min_cost');
            $table->longText('description');
            $table->longText('service');
            $table->string('youtube_videos');
            $table->integer('user_id')->unsigned();
            $table->string('location');
            $table->string('date');
            $table->string('featured_image');
            $table->string('type_of_project');
            $table->string('scope_of_work');
            $table->string('currency')->nullable();
            $table->string('client_name');
            $table->string('area');
            $table->enum('status',[
                0,1]);
            $table->enum('show_on_page',[
                0,1]);
            $table->enum('show_on_result_page',[
                0,1]);
            $table->string('project_status');
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
        Schema::drop('projects');
    }
}
