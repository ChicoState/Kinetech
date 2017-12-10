<?php
/*
 * @author Jordan Laney <jlaney4@mail.csuchico.edu>
 *
 * Migration file to define the orders table for the database.
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('cart_id')->on('carts');
            $table->string('street_address', 50);
            $table->string('apt_number', 10)->default('N/A');
            $table->string('city', 50);
            $table->string('state', 20);
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
