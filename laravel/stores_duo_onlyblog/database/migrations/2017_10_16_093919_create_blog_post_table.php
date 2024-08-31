<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('blogposts', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('categoryId', false, true)->unsigned();
            $table->integer('authorId', false, true)->unsigned();
            $table->string('postTitle', 400)->unique();
            $table->string('postTitleSlug', 420);
            $table->mediumText('postContent');
            $table->string('postSubTitle', 800);
            $table->string('postImgName')->nullable()->unique();
            $table->string('postImgPath')->nullable();
            $table->string('postImgSize', 50)->nullable();
            $table->string('postImgType', 20)->nullable();
            $table->string('postImgCredits', 800)->nullable();
            $table->integer('readMinutes', false, true)->length(3)->nullable();
            $table->string('postStatus', 20);   //  PUBLISH, DRAFT
            $table->string('postRank', 20)->nullable();     //  spare
            $table->string('commentStatus', 20);    //  approved, deleted, rejected
            $table->integer('commentCount', false, true)->nullable();
            $table->integer('likeCount', false, true)->nullable();
            $table->integer('view')->unsigned();
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
        Schema::dropIfExists('blogposts');
    }
}
