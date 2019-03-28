<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessibilityType extends Model {

  /**
   * create()やupdate()で入力を許可しない ブラックリスト
   */
  protected $guarded = [];
}
