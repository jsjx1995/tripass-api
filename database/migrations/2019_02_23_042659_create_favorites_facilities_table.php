<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites_facilities', function (Blueprint $table) {
          $table->increments('id');
          $table->bigInteger('user_id')->unsigned();
          $table->bigInteger('facility_id')->unsigned();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('facility_id')->references('id')->on('facilities');
          $table->unique(['user_id', 'facility_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites_facilities');
    }
}
