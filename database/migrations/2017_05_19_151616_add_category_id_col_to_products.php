<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdColToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // it has to be unsigned
        Schema::table('products', function (Blueprint $table) {
            $table->integer('category_id')->nullable()->after('price')->unsigned();
    
            $table->foreign('category_id')->references('id')->on('categories');
        
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
            $table->dropColumn('category_id');
        });
    }
}
