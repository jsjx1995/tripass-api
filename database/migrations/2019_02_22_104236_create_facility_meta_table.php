<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityMetaTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('facility_meta', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('facility_id')->unsigned()->comment('facilitiesのid');
      $table->char('meta_key')->comment('施設詳細情報のキー');
      $table->longText('meta_value')->comment('施設詳細情報');
      $table->timestamps();
      $table->foreign('facility_id')->references('id')->on('facilities');
      $table->unique(['facility_id', 'meta_key']);//同一施設に対して重複したデータが登録されないようにユニーク指定
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('facility_meta');
  }
}
