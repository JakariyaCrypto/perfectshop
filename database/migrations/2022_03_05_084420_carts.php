<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function(Blueprint $table){
            $table->id();
            $table->bigInteger('product_id');
            $table->bigInteger('product_attr_id');
            $table->string('user_id');
            $table->string('user_type');
            $table->string('qty');
            $table->string('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExixts('carts');
    }
}
