<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('orders',function(Blueprint $table){
            $table->id();
            $table->bigInteger('customer_id');
            $table->string('payment_type');
            $table->string('payment_status');
            $table->string('total_amount')->nullable();
            $table->string('delivery_info');
            $table->string('date');
            $table->string('add_track_info')->nullable();
            $table->string('rand_order_id');
            $table->enum('order_status',['pending','on-the-way','success'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
