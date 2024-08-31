<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('productcategormaps', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('productId')->unsigned();
            $table->integer('filterId')->unsigned();
            $table->integer('categoryId')->unsigned();
            $table->timestamps();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('categoryId')->references('id')->on('categors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productcategormaps');
    }
}
