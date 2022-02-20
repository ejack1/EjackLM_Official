<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReturnToClientToShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->integer('return_to_client_integer')->default(0);
            $table->integer('delivered_to_client_integer')->default(0);
            $table->integer('deleted_or_not_integer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipments', function (Blueprint $table) {
            //
        });
    }
}
