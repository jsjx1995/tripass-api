<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-2-21
 * Time: 22:19
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
 * @Auther: Akio Inoue
 * @package App\Repository
 */
interface FacilityMetaRepositoryInterface {
//  /**
//   * 施設IDに紐づくレコードを1件取得するメソッドです。
//   *
//   * @param int $id 施設ID
//   * @param string $key 取得したいvalue
//   * @return array
//   */
//  public function getFacilityMetaRecord(int $id);

  /**
   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードを全件取得するメソッドです。
   *
   * @param int $id 施設ID
   * @return array
   */

  public function getFacilityMetaRecords(int $id);

  /**
   * 施設のTypeとmeta_keyに紐づくfacility_metaテーブルのレコードを全件取得するメソッドです。
   *
   * @param int $type 施設タイプ
   * @return array
   */

  public function getFacilityMetaRecordsByType(int $type);

//  /**
//   * 施設IDに紐づく開店時間を取得するメソッドです。
//   *
//   * @param int $id 施設ID
//   * @return array
//   */
//  public function findFacilityOpenHours(int $id, string $openHours): array;
//
//  /**
//   *
//   * 施設IDに紐づく閉店時間取得するメソッドです。
//   *
//   * @param int $id 施設ID
//   * @return array
//   */
//  public function findFacilityCloseHours(int $id, string $closeHours): array;

  /**
   * ユーザー情報としてfacilityテーブルに
   * 同時に複数件レコードを追加するためのメソッドです。
   *
   * @param array @saveData 登録データ
   */
  public function createFacility(array $saveData);

  public function updateFacilityMetaRecords(array $saveData);
}
