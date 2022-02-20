<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            // $table->timestamp('created')->default(date("D M j G:i:s T Y"));
            $table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
            // Carbon::now()->timestamp

            // NOTE : THIS  RETURNS SAME VALUE OVER AND OVER AGAIN THAT IS WHY I COMMENTED OTHER METHOD. BUT NOW I AM GOING TO DO IT MANUALLY
            // $table->string('reference')->default(Carbon::now()->timestamp); 
            $table->string('reference')->default(Carbon::now()->toDateTimeString());
            
            $table->string('shipper_reference')->default('-');
            $table->string('AWB')->default('-');

            $table->integer('Delivery_Attempts')->default(0);
            $table->integer('Call_Attempts')->default(0);
            //origin & destination
            // $table->string('origin')->nullable();
            // $table->string('destination')->nullable();
            // $table->integer('origin_id')->nullable();
            // $table->integer('destination_id')->nullable();

            $table->integer('pieces')->default(0);

            $table->string('sender')->nullable();
            $table->string('second_sender')->nullable();
            $table->string('reciever')->nullable();

            $table->string('forward_through')->default('N/A');
            $table->string('airway_bill_no')->default(0);

            $table->string('status')->nullable();
            $table->integer('status_id')->nullable();

            $table->string('pay_status')->default('Pending');
            $table->string('payable_status')->nullable();
            $table->string('receivable_status')->nullable();

            $table->string('schedule')->default('No');
            $table->string('schedule_chanel')->default('N/A');
            $table->string('on_hold')->default('No');
            $table->string('on_hold_reason')->default('N/A');
            $table->string('on_hold_date')->default('N/A');
            $table->string('on_hold_confirm')->default('No');
            $table->integer('on_hold_days')->default(0);

            $table->string('driver_name')->nullable();
            $table->string('driver_comment')->nullable();

            $table->string('details')->nullable();

            $table->string('driver_supplier')->nullable();

            $table->string('warehouse')->nullable();
            
            $table->string('shelve')->nullable();

            $table->string('schedule_date')->default('N/A');
            $table->string('Weight')->nullable();
            
            // Shipment Type 
            $table->string('product_type')->default('Parcel');
            $table->integer('product_type_int')->default('0');
            // $table->string('product_type')->default('Parcel');

            $table->integer('payment_mode')->default('1');

            //ACc no
            $table->string('account_number')->nullable();

            //Sender Info
            $table->string('sender_name')->nullable();
            $table->integer('sender_shipment_country')->nullable();
            $table->string('sender_shipment_city')->nullable();
            $table->integer('sender_city_code')->nullable();
            $table->string('sender_address')->nullable();
            $table->string('sender_mobile')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_id')->nullable();
            //Receiver Info
            $table->string('receiver_name')->nullable();
            $table->integer('receiver_shipment_country')->nullable();
            $table->string('receiver_shipment_city')->nullable();
            $table->integer('receiver_city_code')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('receiver_mobile')->nullable();
            $table->string('receiver_email')->nullable();

            //STATUS ETC
            $table->integer('parcel')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();

            //SERVICES AND PAYMENT INFO
            // Services
            $table->float('service_mode')->nullable();
            $table->string('shipment_value')->nullable();
            $table->string('description')->nullable();
            $table->string('SKU')->nullable();

            //PAYMENT
            $table->float('delivery_charge')->nullable();
            $table->float('cod_charge')->nullable();
            $table->float('additional_charge')->nullable();
            $table->float('total_charge')->nullable();
 

            $table->string('pod')->default('0');
            $table->string('archive')->default('0');

            $table->string('zone')->nullable(); //new

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
        Schema::dropIfExists('shipments');
    }
}
