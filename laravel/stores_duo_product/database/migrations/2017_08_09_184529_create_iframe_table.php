<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIframeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('iframes', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('iframeLink', 1600)->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('iframes')->insert(
            array('iframeLink' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45279.15681344716!2d2.155006812332599!3d41.37629763776478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona%2C+Spain!5e0!3m2!1sen!2sin!4v1521219964785')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iframes');
    }
}
