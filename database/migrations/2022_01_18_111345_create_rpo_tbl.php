<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateRpoTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RPOs', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('unique_id_pic');

            // $table->date('date'); // created_at would work.

            $table->string('city');
            $table->string('route_code');
            $table->string('driver')->nullable();
            $table->string('supplier')->nullable();
            $table->string('status_done')->default(0);
            $table->string('status_total');
            $table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('RPOs');
    }
}
