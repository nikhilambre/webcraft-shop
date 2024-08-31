<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartOptionMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('cartoptionmaps', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('cartId')->unsigned();
            $table->integer('productId')->unsigned();
            $table->integer('optionTypeId')->unsigned();
            $table->timestamps();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('cartId')->references('id')->on('ordercarts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartoptionmaps');
    }
}
