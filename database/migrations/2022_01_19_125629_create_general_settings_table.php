<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('time_zone');
            $table->string('page_row');
            $table->string('default_vat');
            $table->integer('default_country_id');
            $table->string('invoice_number');
            $table->string('awb_number');
            $table->string('awb_format');
            $table->string('curreny');
            $table->string('admin_charset');
            $table->string('front_charset');
            $table->string('logo');
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
        Schema::dropIfExists('general_settings');
    }
}
