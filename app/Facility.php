<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model {
  const CLIENT_DTO_KEY = 'facilities';
  // テーブルは暗黙的にfacilitiesテーブルと紐付いています。

  /**
   * この施設と紐付く詳細情報を取得
   */
  public function facilityMeta() {
    return $this->hasMany('App\FacilityMeta', 'facility_id');
  }

  /**
   * create()やupdate()で入力を受け付ける ホワイトリスト
   */
  protected $fillable = ['id', 'owner_name', 'facility_name', 'type'];
}
