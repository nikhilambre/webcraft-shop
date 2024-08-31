<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('productprices', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('productId')->unsigned();
            $table->decimal('price', 12, 2);
            $table->string('currency', 10);
            $table->string('priceForQnt', 20);
            $table->decimal('discount', 4, 2)->nullable()->default(0.0);
            $table->decimal('tax', 4, 2)->nullable()->default(0.0);
            $table->decimal('finalPrice', 12, 2);
            $table->timestamps();
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productprices');
    }
}
