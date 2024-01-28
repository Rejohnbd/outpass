<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hostel_id');
            $table->unsignedBigInteger('hostel_floor_id')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone_no')->nullable();
            $table->string('address')->nullable();
            $table->string('course')->nullable();
            $table->tinyInteger('year')->nullable();
            $table->string('room_number')->nullable();
            $table->string('picture')->nullable();
            $table->tinyInteger('additional_status')->default(0);
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
        Schema::dropIfExists('user_details');
    }
}
