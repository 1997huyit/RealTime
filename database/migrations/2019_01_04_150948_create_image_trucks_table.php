<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('truck_id')->unsigned();
            $table->foreign('truck_id')
                  ->references('id')->on('trucks')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('image_trucks');
    }
}
