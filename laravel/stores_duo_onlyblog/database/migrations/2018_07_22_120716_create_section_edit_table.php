<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionEditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('editsections', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('sectionId', false, true);  // ($column, $autoIncrement = false, $unsigned = false)
            $table->string('sectionCode')->nullable();  // 
            $table->string('pageName')->nullable();  // 
            $table->string('contentType', 60)->nullable();  // 
            $table->string('sectionContent', 10000)->nullable();
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
        Schema::dropIfExists('editsections');
    }
}
