<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->longText('about_us');
            $table->string('mobile_number');
            $table->string('business_name');
            $table->string('category');
            $table->string('pincode');
            $table->string('password');
            $table->enum('status',['Terminate','Active','Suspend']);
            $table->string('website');
            $table->integer('verification_code');
            $table->integer('verified');
            $table->integer('super_pros');
            $table->string('license');
            $table->string('license_expiry');
            $table->string('accreditation');
            $table->string('avatar');
            $table->string('cover');
            $table->longText('service');
            
            $table->string('founding_year');
            $table->string('type_of_property');
            $table->string('scope_of_work');
            $table->string('youtube');
            $table->string('password_hash');
            $table->string('trusted_image');
            $table->string('community_reviews');
            $table->string('licensed_by_state');
            $table->string('background_checked');
            $table->string('porch_pledge');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('googleplus');
            $table->string('linkedin');
            $table->string('instagram');
            $table->string('tumblr');
            
            $table->string('pinterest');
            $table->string('youtube_channel');

            $table->string('street');
            $table->string('area');
            $table->string('zipcode');
            
            $table->string('area_served');

            $table->string('latitude');
            $table->string('longitude');
            
            $table->string('awards');

            $table->enum('type', ['user', 'vendor']);
            $table->integer('claim_verification_code');
            $table->integer('claim_status');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
