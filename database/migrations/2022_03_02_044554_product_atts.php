<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductAtts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_atts', function(Blueprint $table){
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('attr_size')->nullable();
            $table->bigInteger('attr_color')->nullable();
            $table->integer('attr_mrp')->nullable();
            $table->integer('attr_price')->nullable();
            $table->integer('attr_qty')->nullable();
            $table->string('attr_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExixts('product_atts');
    }
}
