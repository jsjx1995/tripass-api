<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMetaTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('user_meta', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('user_id')->unsigned()->comment('usersテーブルのid');
      $table->string('meta_key', 255)->comment('ユーザー詳細のキー');
      $table->longText('meta_value')->comment('ユーザー詳細の値');
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users');
      $table->unique(['user_id', 'meta_key']);//同一ユーザーに対して重複したデータが登録されないようにユニーク指定

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('user_meta');
  }
}
