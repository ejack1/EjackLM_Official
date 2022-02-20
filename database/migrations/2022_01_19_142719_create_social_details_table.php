<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_details', function (Blueprint $table) {
            $table->id();
            $table->string('fb');
            $table->boolean('fb_availability')->nullable();
            $table->string('insta');
            $table->boolean('insta_availability')->nullable();
            $table->string('twitter');
            $table->boolean('twitter_availability')->nullable();
            $table->string('yt');
            $table->boolean('yt_availability')->nullable();

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
        Schema::dropIfExists('social_details');
    }
}
