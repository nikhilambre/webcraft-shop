<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('blogcomments', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('postId')->unsigned();
            $table->integer('customerId')->unsigned();
            $table->string('customerVarId')->nullable();
            $table->string('commentContent', 2000);
            $table->string('commentStatus', 20);    //  APPROVED, DELETED, REJECTED, PENDING
            $table->string('commentType', 20);      //  COMMENT, REPLY
            $table->string('commentFlag', 20);      //  READ, UNREAD
            $table->integer('commentParentId')->nullable()->unsigned();   //  If it's a reply
            $table->integer('like')->unsigned();
            $table->integer('dislike')->unsigned();
            $table->timestamps();
            
            $table->foreign('postId')->references('id')->on('blogposts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogcomments');
    }
}
