<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('enquirs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('enquiryName');
            $table->string('enquiryEmail', 100);
            $table->bigInteger('enquiryContact', false, true);      //  ($column, $autoIncrement = false, $unsigned = false)
            $table->integer('productId')->unsigned();
            $table->string('enquiryFlag', 10)->nullable();
            $table->string('enquiryText', 1600);
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
        Schema::dropIfExists('enquirs');
    }
}
