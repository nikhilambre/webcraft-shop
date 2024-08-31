<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('ordercarts', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('productId')->unsigned();
            $table->string('currency', 10);
            $table->decimal('productCost', 12, 2);      //  Cost to be returned if product returned excluding Tax
            $table->string('couponCode', 40)->nullable();   //  Applied Coupon Code
            $table->integer('quantity', false, true)->length(3);  //  ($column, $autoIncrement = false, $unsigned = false)
            $table->integer('customerId')->unsigned()->nullable();  //If signed in user can save cart
            $table->integer('coockieId')->unsigned()->nullable();   //If non-signed in user save cart
            $table->string('status', 40);   //  Active, Purchased to render on generate order page before mapping it to order (Active, Ordered, Cancelled, Returned, Replaced)
            $table->integer('cartCode')->unsigned()->nullable();     //Code to map with order, Need to be saved for all active carts just before creating order.Then status will be ordered
            $table->string('deliveryStatus', 40);   //  Ordered, Packed, Shipped, Out for Delivery, Delivered, Return Requested, Return Scheduled, Returned
            $table->timestamps();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordercarts');
    }
}
