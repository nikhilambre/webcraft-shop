<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('orderaddrs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->integer('orderId')->unsigned();
            $table->string('addrType', 20);
            $table->string('addrText', 150);
            $table->string('addrCity', 30);
            $table->string('addrState', 30);
            $table->string('addrCountry', 40);
            $table->string('addrPincode', 15);
            $table->string('addrChat', 100);
            $table->timestamps();
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderaddrs');
    }
}
