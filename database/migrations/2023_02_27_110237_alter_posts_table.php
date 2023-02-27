<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {       
          
            $table->text('description'); 
            $table->string('image');
            $table->boolean('status')->default(1);            
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
         
            $table->dropColumn('description');
            $table->dropColumn('image');   
            $table->dropColumn('status');   
        });   
    }
};
