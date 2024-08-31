<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptiontypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('productoptiontypes', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('optionTypeName')->unique();
            $table->string('typeData')->nullable();     // for future use like color as #333 acn be inputed from user
            $table->integer('optionId')->unsigned();
            $table->timestamps();
            $table->foreign('optionId')->references('id')->on('productoptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productoptiontypes');
    }
}
