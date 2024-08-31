<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('customeraddrs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->string('addrType', 20)->nullable();
            $table->string('addrText', 200);
            $table->string('addrCity', 30);
            $table->string('addrState', 30);
            $table->string('addrCountry', 40);
            $table->string('addrPincode', 15);
            $table->string('addrChat', 100)->nullable();
            $table->bigInteger('addrContactNo')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('customerId')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customeraddrs');
    }
}
