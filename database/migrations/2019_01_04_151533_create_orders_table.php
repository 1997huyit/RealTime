<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('deliveryaddress')->nullable();
            $table->string('takenaddress')->nullable();
            $table->double('shippingcost')->nullable();
            $table->string('payment_status')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('extra_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('truck_id')->nullable();
            $table->softDeletes();
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
