<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {
  const CLIENT_DTO_KEY = 'user_meta';
  //user_metaテーブルと関連づけ
  protected $table = 'user_meta';
  /**
   * create()やupdate()で入力を受け付ける ホワイトリスト
   */
  protected $fillable = ['meta_key', 'meta_value'];
}
