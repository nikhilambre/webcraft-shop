<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('orders', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->string('orderCode', 20)->nullable();
            $table->string('orderName', 60);
            $table->string('orderOrgName', 100);
            $table->string('orderEmail', 100);
            $table->bigInteger('orderContactNo', false, true)->length(22);
            $table->string('orderCurrency', 5);
            $table->decimal('orderCost', 12, 2);
            $table->string('orderDescription', 1600);
            $table->integer('productId', false, true)->nullable()->default(1);  //  ($column, $autoIncrement = false, $unsigned = false)
            $table->string('productCode')->nullable();
            $table->string('orderStatus', 20);  // CREATED, SAVED, PAID, COMPLETE, HOSTED
            $table->string('billingStatus', 20)->nullable();    // UNPAID, PAID, NONREFUNDABLE
            $table->string('deliveryStatus', 20)->nullable();   // PENDING, DELIVERED
            $table->string('orderData1', 400)->nullable()->default('data');
            $table->string('orderData2', 400)->nullable()->default('data');
            $table->string('orderData3', 800)->nullable()->default('data');
            $table->string('orderData4', 800)->nullable()->default('data');
            $table->integer('orderTerms', false, true)->length(2);
            $table->timestamp('ordered_on')->nullable();
            $table->timestamp('cancelled_on')->nullable();
            $table->timestamp('dispatch_on')->nullable();
            $table->timestamp('delivered_on')->nullable();
            $table->timestamp('completed_on')->nullable();
            $table->timestamp('replace_on')->nullable();
            $table->timestamp('refund_on')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `orders` ADD `orderIp` VARBINARY(16)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `orders` DROP COLUMN `orderIp`');

        Schema::dropIfExists('orders');
    }
}
