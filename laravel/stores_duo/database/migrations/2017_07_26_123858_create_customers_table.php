<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('name', 40);
            $table->string('lastname', 60);
            $table->string('email', 100)->unique();
            $table->string('password', 60);
            $table->tinyInteger('verified')->default(0); // this column will be a TINYINT with a default value of 0 , [0 for false & 1 for true i.e. verified]
            $table->string('email_token')->nullable(); // this column will be a VARCHAR with no default value and will also BE NULLABLE
            $table->bigInteger('contact_no')->unique()->nullable();
            $table->string('billing_addr', 600)->nullable();
            $table->string('shipping_addr', 600)->nullable();
            $table->string('customerImgName')->nullable()->unique();
            $table->string('customerImgPath')->nullable();
            $table->string('customerImgSize', 50)->nullable();
            $table->string('customerImgType', 20)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
