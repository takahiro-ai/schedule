<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_user', function (Blueprint $table) {
        $table->integer('schedule_id')->unsigned();    //students,subjectsテーブルのidが
        $table->integer('user_id')->unsigned();    //bigIncrementであった場合はbigIntegerにする
        $table->primary(['schedule_id', 'user_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_user');
    }
}
