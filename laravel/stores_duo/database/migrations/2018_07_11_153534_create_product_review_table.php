<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('productreviews', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('productId', false, true);      //  ($column, $autoIncrement = false, $unsigned = false)
            $table->integer('customerId', false, true);      //  ($column, $autoIncrement = false, $unsigned = false)
            $table->string('customerVarId')->nullable();
            $table->string('reviewContent', 2000);
            $table->string('reviewStatus', 20)->nullable();    //  Not in use Aproved, Deleted, Rejected, Pending
            $table->string('reviewType', 20);      //  REVIEW, REPLY
            $table->integer('reviewParentId')->nullable()->unsigned();   //  If it's a reply
            $table->integer('rating')->unsigned()->nullable();   //  only for review
            $table->string('ratingVar1')->nullable();   //  not in use now
            $table->string('ratingVar2')->nullable();   //  not in use now
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
        Schema::dropIfExists('productreviews');
    }
}
