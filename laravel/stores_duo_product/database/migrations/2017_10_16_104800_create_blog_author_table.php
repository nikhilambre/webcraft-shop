<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('blogauthors', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('authorName', 100)->unique();
            $table->string('authorNameSlug', 120);
            $table->string('authorDetails', 800);
            $table->string('authorDescription', 10000);
            $table->string('authorProfession', 100);
            $table->string('authorSocialLinks', 1600)->nullable();    // Not in use-wrongly created
            $table->integer('authorAge', false, true)->length(5)->unsigned();
            $table->string('authorEducation')->nullable();
            $table->string('authorImgName')->nullable()->unique();
            $table->string('authorImgPath')->nullable();
            $table->string('authorImgSize', 50)->nullable();
            $table->string('authorImgType', 20)->nullable();
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
        Schema::dropIfExists('blogauthors');
    }
}
