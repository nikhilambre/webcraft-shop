<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('addrs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('addressHead', 40);
            $table->string('addressBody', 400);
            $table->bigInteger('addressNumber');
            $table->string('addressName', 60);
            $table->string('addressEmail', 100);
            $table->string('addressLine1')->nullable();
            $table->string('addressLine2')->nullable();
            $table->string('addressLine3')->nullable();
            $table->string('addressLine4')->nullable();
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
        Schema::dropIfExists('addrs');
    }
}
