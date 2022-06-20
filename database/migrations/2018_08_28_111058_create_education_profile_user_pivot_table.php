<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationProfileUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_profile_user', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('education_profile_id')->unsigned();
          $table->longText('institution_name');
          $table->float('marks');
          $table->text('year');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('education_profile_id')->references('id')->on('education_profiles')->onDelete('cascade');
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
        Schema::table('education_profile_user', function (Blueprint $table) {
            //
        });
    }
}
