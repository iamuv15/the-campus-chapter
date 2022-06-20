<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWorkExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_work_experience', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->text('company_name');
          $table->longText('job_description');
          $table->integer('start_date')->unsigned();
          $table->integer('end_date')->unsigned();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('start_date')->references('new_date_id')->on('date_purpose_new_date_user')->onDelete('cascade');
          $table->foreign('end_date')->references('new_date_id')->on('date_purpose_new_date_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_work_experience', function (Blueprint $table) {
            //
        });
    }
}
