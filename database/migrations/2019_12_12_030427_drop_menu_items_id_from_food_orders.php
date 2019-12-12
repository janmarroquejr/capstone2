<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropMenuItemsIdFromFoodOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_orders', function (Blueprint $table) {
            $table->dropForeign(['menu_items_id']);
            $table->dropColumn('menu_items_id');
            $table->dropColumn('total_price');
            $table->dropColumn('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_items_id');
            $table->foreign('menu_items_id')->references('id')->on('menu_items');
            $table->integer('total_price');
            $table->integer('quantity');
        });
    }
}
