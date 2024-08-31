<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('templates', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('type', 20);                             //  header, footer
            $table->integer('typeId')->unsigned();                  //  a number
            $table->integer('subType')->unsigned()->nullable();     //  a number, if it has sub types
            $table->string('typeName', 60)->nullable();             //  It's display name
            $table->string('typeDescription', 2400)->nullable();      //  It's display desc
            $table->text('htmlContent')->nullable();          //  html content
            $table->text('htmlLaravelContent')->nullable();          //  html Laravel enabled content
            $table->string('templateImage')->nullable();
            $table->string('customStyle', 1000)->nullable();          //  custome style link
            $table->string('vendorStyle', 1000)->nullable();         //  vendor style link   <lin..
            $table->string('fonts', 1000)->nullable();                //  google fonts used
            $table->text('vendorScripts')->nullable();       //  vendor scripts
            $table->text('scripts')->nullable();              //  script text <scr ..
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
        Schema::dropIfExists('templates');
    }
}
