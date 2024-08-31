<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTagmapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('blogtagmaps', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('postId')->unsigned();
            $table->integer('tagId')->unsigned();
            $table->timestamps();
            $table->foreign('postId')->references('id')->on('blogposts')->onDelete('cascade');
            $table->foreign('tagId')->references('id')->on('blogtags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogtagmaps');
    }
}
