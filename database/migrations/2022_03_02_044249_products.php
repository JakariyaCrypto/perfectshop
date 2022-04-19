<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('cat_id');
            $table->bigInteger('sub_cat_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('size_id')->nullable();
            $table->bigInteger('color_id')->nullable();
            $table->string('price')->nullable();
            $table->string('mrp')->nullable();
            $table->longText('description');
            $table->string('image');
            $table->string('warranty');
            $table->bigInteger('banner_id')->nullable();
            $table->bigInteger('slider_id')->nullable();
            $table->string('date');
            $table->enum('status',['active','inactive']);
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
        Schema::dropIfExixts('products');
    }
}
