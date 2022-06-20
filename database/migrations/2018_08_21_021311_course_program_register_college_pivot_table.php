<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CourseProgramRegisterCollegePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_program_register_college', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('college_id')->unsigned();
          $table->integer('program_id')->unsigned();
          $table->integer('course_id')->unsigned();
          $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
          $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
          $table->foreign('college_id')->references('college_id')->on('register_colleges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_program_register_college', function (Blueprint $table) {
            //
        });
    }
}
