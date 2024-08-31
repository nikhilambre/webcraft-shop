<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('orderdatas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->integer('orderId')->unsigned();
            $table->string('domainName', 20)->default('NOT RECEIVED');
            $table->string('tagLine', 20)->default('NOT RECEIVED');
            $table->string('contactEmail', 20)->default('NOT RECEIVED');
            $table->string('contactAddr1', 20)->default('NOT RECEIVED');
            $table->string('contactAddr2', 20)->default('NOT RECEIVED');
            $table->string('contentFile', 20)->default('NOT RECEIVED');
            $table->string('seoContent', 20)->default('NOT RECEIVED');
            $table->string('pageContent', 20)->default('NOT RECEIVED');
            $table->string('images', 20)->default('NOT RECEIVED');
            $table->string('brandImage', 20)->default('NOT RECEIVED');
            $table->string('favicon', 20)->default('NOT RECEIVED');
            $table->string('video', 20)->default('NOT RECEIVED');
            $table->string('videoLink', 20)->default('NOT RECEIVED');
            $table->string('font', 20)->default('NOT RECEIVED');
            $table->timestamps();
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdatas');
    }
}
