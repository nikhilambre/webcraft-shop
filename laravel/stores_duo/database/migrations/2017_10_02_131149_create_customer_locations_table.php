<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('customerlocations', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('customerId')->unsigned();
            $table->string('affiliateId', 100)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('state', 20)->nullable();
            $table->string('state_name', 60)->nullable();
            $table->string('country', 60)->nullable();
            $table->string('currency', 20)->nullable();
            $table->string('iso_code', 20)->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `customerlocations` ADD `ip` VARBINARY(16)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `customerlocations` DROP COLUMN `ip`');

        Schema::dropIfExists('customerlocations');
    }
}
