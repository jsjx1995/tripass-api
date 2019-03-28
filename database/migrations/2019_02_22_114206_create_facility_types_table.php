<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityTypesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('facility_types', function (Blueprint $table) {
      $table->increments('type_id');
      $table->string('name', 100)->comment('施設タイプ名');
      $table->string('slug', 100)->comment('slug名');
      $table->integer('type_order')->comment('SELECTする際の取得順');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('facility_types');
  }
}
