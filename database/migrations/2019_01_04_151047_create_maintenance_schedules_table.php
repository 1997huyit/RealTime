<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('maintenance_schedules');
    }
}
