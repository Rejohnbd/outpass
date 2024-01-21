<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutpassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outpasses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('outpass_id')->unique();
            $table->tinyInteger('outpass_type')->default(0)->comment('0 = Outpass, 1 = Homepass');
            $table->string('purpose');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->boolean('parent_permission')->default(0)->comment('0 = No, 1 = Yes');
            $table->tinyInteger('status')->default(0)->comment('0 = Pending, 1 = Approved, 2 = Rejected');
            $table->dateTime('approval_date_time')->nullable();
            $table->tinyInteger('notification_status')->default(0)->comment('0 = No, 1 = Admin Seen, 2 = Client Seen');
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
        Schema::dropIfExists('outpasses');
    }
}