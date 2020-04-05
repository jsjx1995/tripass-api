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
interface FacilityRepositoryInterface {
  /**
   * 施設IDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id 施設ID
   * @return array
   */
  public function findFacility(int $id);

  // /**
  //  * facilitiesテーブルから指定したEmailに該当したレコードを
  //  * 取得するメソッドです。
  //  *
  //  * @param string $facilityEmail ユーザーのアドレス
  //  * @return array
  //  */
  // public function whereFacilityEmail(string $facilityEmail): array;

  public function createFacility();
}
