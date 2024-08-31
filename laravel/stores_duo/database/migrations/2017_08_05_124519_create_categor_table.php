<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('categors', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('categoryName')->unique();
            $table->string('categoryDescription', 1600);
            $table->string('categoryStatus', 20);
            $table->string('categoryImgName')->nullable()->unique();
            $table->string('categoryImgPath')->nullable();
            $table->string('categoryImgSize', 50)->nullable();
            $table->string('categoryImgType', 20)->nullable();
            $table->integer('filterId')->unsigned();
            $table->string('categoryTag', 20)->nullable();
            $table->timestamps();
            $table->foreign('filterId')->references('id')->on('filters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categors');
    }
}
