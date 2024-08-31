<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTagMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('producttagmaps', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('productId')->unsigned();
            $table->integer('tagId')->unsigned();
            $table->timestamps();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('tagId')->references('id')->on('producttags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producttagmaps');
    }
}
