<?php

use App\Models\UserDetails;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allUserDetails = UserDetails::all();
        foreach ($allUserDetails as $userDetails) :
            $userDetails->course = 11;
            $userDetails->save();
        endforeach;

        Schema::table('user_details', function (Blueprint $table) {
            $table->renameColumn('course', 'course_id');
        });

        Schema::table('user_details', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('user_details', function (Blueprint $table) {
            $table->renameColumn('course_id', 'course');
        });

        Schema::table('user_details', function (Blueprint $table) {
            $table->string('course')->change()->nullable();
        });

        $allUserDetails = UserDetails::all();
        foreach ($allUserDetails as $userDetails) :
            $userDetails->course = 'bca';
            $userDetails->save();
        endforeach;
    }
}
