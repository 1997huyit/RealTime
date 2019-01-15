<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayOffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_offs', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('time_start')->nullable();
            $table->datetime('time_end')->nullable();
            $table->string('status')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users');
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
        Schema::dropIfExists('day_offs');
    }
}
