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
            $table->string('domainName', 7)->default('false');
            $table->string('tagLine', 7)->default('false');
            $table->string('contactEmail', 7)->default('false');
            $table->string('contactAddr1', 7)->default('false');
            $table->string('contactAddr2', 7)->default('false');
            $table->string('contentFile', 7)->default('false');
            $table->string('seoContent', 7)->default('false');
            $table->string('pageContent', 7)->default('false');
            $table->string('images', 7)->default('false');
            $table->string('brandImage', 7)->default('false');
            $table->string('favicon', 7)->default('false');
            $table->string('video', 7)->default('false');
            $table->string('videoLink', 7)->default('false');
            $table->string('font', 7)->default('false');
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
