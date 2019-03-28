<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
  const CLIENT_DTO_KEY = 'users';
  //テーブルは暗黙的にusersテーブルと紐付いています

  /**
   * このユーザーと紐付く詳細情報を取得
   */
  public function userMeta() {
    return $this->hasMany('App\UserMeta', 'user_id');
  }

  /**
   * create()やupdate()で入力を受け付ける ホワイトリスト
   */
  protected $fillable = ['id', 'user_login', 'user_email', 'display_name'];
}
