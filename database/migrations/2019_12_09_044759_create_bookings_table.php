<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('duration');
            $table->integer('num_of_guests');
            $table->date('start_date');
            $table->string('comments');
            $table->boolean('isPaid');
            $table->string('payment_method');
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('food_order_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('bookings');
    }
}
