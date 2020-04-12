<?php

/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-2-20
 * Time: 13:43
 */

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UserRepository
 *
 * facilityテーブルの操作を行うインターフェースです。
 *
 * @Auther: Akio
 * @package App\Repository
 */
interface FacilityRepositoryInterface
{
  /**
   * 施設IDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id 施設ID
   * @return array
   */
  public function findFacility(int $id);

  /**
   * facilitiesテーブルから指定したEmailに該当したレコードを
   * 指定したfaiclitt_typeと与えられた緯度経度から5キロ以内の施設レコードを
   * 取得するメソッドです。
   *
   * @param string $facility_type 施設タイプ
   * @param string $facility_lat 経度
   * @param string $facility_lng 緯度
   * @return array
   */
  public function findNearFacilityByFacilityType(string $type, string $lat, string $lng);

  // public function createFacility();
}
