<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->integer('college_id')->unsigned();
          $table->string('first_name', 32);
          $table->string('middle_name', 32)->nullable($value = true);
          $table->string('last_name', 32);
          $table->string('email', 128)->unique();
          $table->string('password', 128);
          $table->rememberToken();
          $table->timestamps();
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
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
