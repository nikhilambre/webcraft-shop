<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionTypeMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('productoptiontypemaps', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('productId')->unsigned();
            $table->integer('optionId')->unsigned();
            $table->integer('optionTypeId')->unsigned();
            $table->integer('typeStock')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('optionId')->references('id')->on('productoptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productoptionmaps');
    }
}
