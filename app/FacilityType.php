<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityType extends Model {
  /**
   * create()やupdate()で入力を許可しない ブラックリスト
   */
  protected $guarded = [];

  /**
   * このtypeと紐付くfacility_type_relationshipsのレコードを取得
   * 多対多の関係性のため、中間テーブル(裏で自動作成される)を利用しますが、
   * 中間テーブルにcountを定義します。
   */
  public function TypeRelationship() {
    $this->belongsToMany('App\FacilityTypeRelationship')->withPivot('count');
  }
}
