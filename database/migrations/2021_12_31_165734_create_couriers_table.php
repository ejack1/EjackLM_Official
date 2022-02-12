<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country_id');
            $table->string('code');
            $table->string('mobile');
            $table->string('email');
            $table->string('iqamanumber');
            $table->string('iqamafile');
            $table->string('license');
            $table->string('vehicle');
            $table->string('color');
            $table->string('supplier');
            $table->string('password');
            $table->string('vehiclenumber');
            $table->string('image');
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
        Schema::dropIfExists('couriers');
    }
}
