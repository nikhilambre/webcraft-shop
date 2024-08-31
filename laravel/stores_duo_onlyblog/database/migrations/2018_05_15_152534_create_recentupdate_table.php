<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecentupdateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('recentupdates', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('image', 20);
            $table->string('type', 20);
            $table->integer('mapCode')->unsigned();     //  id of actual entry type
            $table->string('text11', 80)->nullable();   //0  display text-1 #Author/
            $table->string('text12', 80)->nullable();   //1  hover title-2
            $table->string('text13', 80)->nullable();   //2  anchor link-3
            $table->string('text21', 80)->nullable();   //3  #Post/
            $table->string('text22', 80)->nullable();   //4
            $table->string('text23', 80)->nullable();   //5
            $table->string('text31', 80)->nullable();   //6  #Customer/
            $table->string('text32', 80)->nullable();   //7
            $table->string('text33', 80)->nullable();   //8
            $table->string('text41', 80)->nullable();   //9  #Message/
            $table->string('text42', 80)->nullable();   //10
            $table->string('text43', 80)->nullable();   //11
            $table->string('text51', 80)->nullable();   //12  
            $table->string('text52', 80)->nullable();   //13
            $table->string('text53', 80)->nullable();   //14
            $table->string('text61', 80)->nullable();   //15
            $table->string('text62', 80)->nullable();   //16
            $table->string('text63', 80)->nullable();   //17
            $table->string('text71', 80)->nullable();   //18
            $table->string('text72', 80)->nullable();   //19
            $table->string('text73', 80)->nullable();   //20
            $table->string('text81', 80)->nullable();   //21
            $table->string('text82', 80)->nullable();   //22
            $table->string('text83', 80)->nullable();   //23
            $table->string('text91', 80)->nullable();   //24
            $table->string('text92', 80)->nullable();   //25
            $table->string('text93', 80)->nullable();   //26
            $table->timestamps();
        });
    }

    /**
     * Blog Page::
     * [Rohit Ambre] added new [post]   - 1,2
     * [Rohit Ambre] added as New Author    - 1
     * [Rohit Ambre] liked your [Post]     - 3,2
     * [Rohit Ambre] Subscribed your Blog   - 3
     * [Rohit Ambre] Commented on your [Post]   - 3,2
     * [XYZ] Sent you a [message]   - 4
     * - Author
     * - Post
     * - Customer
     * - message
     * 
     * Product Page::
     * 
     * here what we can do is:::
     * while saving in recent update table use exact column names eg. text31 or text42
     * we will have mapping of all these columns to array value position as from array[0] to array[26]
     * While displaying in dashboard we will use this mapping inside array will copy data in perfect array position
     * and will have 6 ngIf in display and each will have hardcoded value mapped on each position
     * 
     */



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recentupdates');
    }
}
