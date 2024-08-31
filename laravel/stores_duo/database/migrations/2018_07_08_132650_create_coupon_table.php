<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('coupons', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('couponCode', 16)->unique();
            $table->integer('couponPercentage')->unsigned()->nullable();
            $table->integer('couponAmount')->unsigned()->nullable();
            $table->string('status', 40);   //  Active & Inactive
            $table->string('couponType', 40)->nullable();   //  Not in use now
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
        Schema::dropIfExists('coupons');
    }
}
