<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_items_id');
            $table->unsignedBigInteger('food_order_id');
            $table->timestamps();

            $table->foreign('menu_items_id')->references('id')->on('menu_items');
            $table->foreign('food_order_id')->references('id')->on('food_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_orders');
    }
}
