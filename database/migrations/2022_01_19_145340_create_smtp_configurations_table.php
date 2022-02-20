<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp_configurations', function (Blueprint $table) {
            $table->id();
            $table->integer('availability')->default(1);
            $table->integer('port');
            $table->string('secure');
            $table->string('host');
            $table->string('username');
            $table->string('password');
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
        Schema::dropIfExists('smtp_configurations');
    }
}
