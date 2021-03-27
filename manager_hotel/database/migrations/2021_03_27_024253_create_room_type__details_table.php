<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_type__details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dientich',200)->nullable();
            $table->string('huongphong',200)->nullable();
            $table->string('giuong',200)->nullable();
            $table->unsignedInteger('room_type_id');
            $table->foreign('room_type_id')->references('id')->on('roomtypes')->onDelete('cascade');
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
        Schema::dropIfExists('room_type__details');
    }
}
