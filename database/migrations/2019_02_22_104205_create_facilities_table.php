<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('facilities', function (Blueprint $table) {
      $table->bigIncrements('id')->unsigned();
      $table->BigInteger('owner_id')->unsigned()->comment('施設のオーナーID');
      $table->integer('type')->comment('施設タイプ');
      $table->foreign('owner_id')->references('id')->on('users');
      $table->timestamps();
      $table->unique('owner_id');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('facilities');
  }
}
