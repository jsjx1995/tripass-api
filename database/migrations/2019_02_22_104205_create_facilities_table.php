<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('facility_basicinfo', function (Blueprint $table) {
      $table->bigIncrements('id')->unsigned();
      // $table->BigInteger('owner_id')->unsigned()->nullable($value = true)->comment('施設のオーナーID');
      $table->string('facility_name')->comment('施設名称');
      $table->string('facility_type')->comment('施設タイプ');
      $table->string('facility_bio')->comment('施設紹介文')->nullable($value = true);
      $table->string('facility_post')->comment('郵便番号')->nullable($value = true);
      $table->string('facility_address')->comment('住所')->nullable($value = true);
      $table->string('facility_phone')->comment('電話番号')->nullable($value = true);
      $table->string('facility_fax')->comment('FAX番号')->nullable($value = true);
      $table->string('facility_email')->comment('メールアドレス')->nullable($value = true);
      $table->string('facility_url')->comment('URL')->nullable($value = true);
      $table->boolean('facility_toilet')->comment('多機能トイレの有無');
      $table->boolean('facility_signlanguage')->comment('手話対応の有無');
      $table->boolean('facility_elevator')->comment('エレベータの有無');
      $table->boolean('facility_wheelchair')->comment('車椅子貸し出しの有無');
      $table->boolean('facility_parking')->comment('身障者用駐車場の有無');

      $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('facility_basicinfo');
  }
}
