<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('seos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('pageName', 40);
            $table->string('seoStatus', 20);
            $table->string('title', 60);
            $table->string('description', 160);
            $table->string('keyword', 200);
            $table->string('ogImgName')->nullable()->unique();
            $table->string('ogImgPath')->nullable();
            $table->string('ogImgSize', 50)->nullable();
            $table->string('ogImgType', 20)->nullable();
            $table->string('twitterCardType', 50)->nullable();  //summary_large_image, summary, app
            $table->string('twitterSite', 50)->nullable();      //@nytimes
            $table->string('twitterCreator', 50)->nullable();   //@SarahMaslinNir
            $table->string('twitterAppCountry', 50)->nullable();    //US
            $table->string('twitterAppNameIphone', 50)->nullable(); //Cannonball
            $table->string('twitterAppIdIphone', 50)->nullable(); //929750075
            $table->string('twitterAppUrlIphone', 100)->nullable();  //cannonball://poem/5149e249222f9e600a7540ef
            $table->string('twitterAppNameIpad', 50)->nullable();
            $table->string('twitterAppIdIpad', 50)->nullable();
            $table->string('twitterAppUrlIpad', 100)->nullable();
            $table->string('twitterAppNameGoogleplay', 50)->nullable();
            $table->string('twitterAppIdGoogleplay', 50)->nullable();
            $table->string('twitterAppUrlGoogleplay', 100)->nullable();
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
        Schema::dropIfExists('seos');
    }
}
