<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('user_login', 60)->comment('ログインに使用されるユーザー名');
      $table->string('user_email', 100)->comment('ユーザーのメールアドレス');
      $table->string('user_display_name', 250)->comment('ユーザーの表示名');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('users');
  }
}
