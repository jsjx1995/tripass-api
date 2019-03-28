<?php

namespace App;

use App\Repository\FacilityRepositoryInterface;
use App\Facility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 *
 * Facilityテーブルの操作を行う具象クラスです。
 *
 * @Author: Akio
 * @package App\Repository
 */
class FacilityRepository implements FacilityRepositoryInterface {
  /**
   * 施設IDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id 施設ID
   * @return array
   */
  public function find(int $id) {
    return Facility::findOrFail($id)->toArray();
  }

  /**
   * facilitiesテーブルから指定したEmailに該当したレコードを
   * 取得するメソッドです。
   *
   * @param string facilityEmail ユーザーのアドレス
   * @return array
   */
  public function whereFacilityEmail(string $facilityEmail): array {
    return Facility::whereFacilityEmail($facilityEmail)->get()->toArray();
  }
}