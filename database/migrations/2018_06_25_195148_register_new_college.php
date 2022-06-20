<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisterNewCollege extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_colleges', function (Blueprint $table) {
          $table->increments('college_id')->unsigned();
          $table->string('college_name', 280);
          $table->string('abbrivation', 16)->nullable();
          $table->string('locality', 128);
          $table->string('city', 64);
          $table->string('state', 64);
          $table->string('country', 32);
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
        Schema::table('registercolleges', function (Blueprint $table) {
            //
        });
    }
}
