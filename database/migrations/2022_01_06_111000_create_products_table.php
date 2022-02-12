<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('startrange');
            $table->string('endrange');
            $table->string('maximumweight');
            $table->string('dsetup');
            $table->string('maximumheight');
            $table->string('maximumwidth');
            $table->string('maximumlength');
            $table->string('servicetype');
            $table->string('pickupcharge');
            $table->string('timefrom');
            $table->string('timeto');
            $table->string('printer');
            $table->string('compensation');
            $table->string('desc');
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
        Schema::dropIfExists('products');
    }
}
