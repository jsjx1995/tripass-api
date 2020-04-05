<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityMetaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('facility_meta', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('facility_id')->unsigned()->comment('facilitiesのid');
      // $table->string('meta_key')->comment('施設詳細情報のキー');
      // $table->longText('meta_value')->comment('施設詳細情報');
      $table->string('facility_bio')->comment('施設紹介文')->nullable();
      $table->string('facility_address')->comment('住所')->nullable();
      $table->string('facility_phone')->comment('電話番号')->nullable();
      $table->string('facility_fax')->comment('FAX番号')->nullable();
      $table->string('facility_email')->comment('メールアドレス')->nullable();
      $table->string('facility_url')->comment('URL')->nullable();
      $table->boolean('facility_toilet')->comment('多機能トイレの有無');
      $table->boolean('facility_signlanguage')->comment('手話対応の有無');
      $table->boolean('facility_elevator')->comment('エレベータの有無');
      $table->boolean('facility_slope')->comment('スロープの有無');
      $table->boolean('facility_wheelchair')->comment('車椅子貸し出しの有無');
      $table->boolean('facility_parking')->comment('身障者用駐車場の有無');
      $table->foreign('facility_id')->references('id')->on('facilities');
      // $table->unique(['facility_id', 'meta_key']); //同一施設に対して重複したデータが登録されないようにユニーク指定
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('facility_meta');
  }
}
