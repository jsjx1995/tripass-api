<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityMeta extends Model {
  const CLIENT_DTO = 'facility_meta';
  //facility_metaテーブルと関連付け
  protected $table = 'facility_meta';
  /**
   * create()やupdate()で入力を受け付ける ホワイトリスト
   */
  protected $fillable = ['meta_key', 'meta_value'];
}
