<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('producttaxs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('taxCategory')->unique();
            $table->integer('taxRate', false, true);  // ($column, $autoIncrement = false, $unsigned = false)
            $table->string('HSNCode')->nullable();
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
        Schema::dropIfExists('producttaxs');
    }
}
