<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('products', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('productDisplayId', 40)->nullable();
            $table->string('productName')->unique();
            $table->string('productNameSlug')->nullable();
            $table->string('description', 8000)->nullable();
            $table->string('shortDescription', 400)->nullable();
            $table->string('status');   //  ACTIVE, INACTIVE
            $table->integer('productStock', false, true)->nullable();   //  ($column, $autoIncrement = false, $unsigned = false)
            $table->string('mark', 40)->nullable();
            $table->string('couponStatus', 40)->nullable();     // Applicable, Notapplicable
            $table->integer('view')->unsigned()->nullable();
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
        Schema::dropIfExists('products');
    }
}
