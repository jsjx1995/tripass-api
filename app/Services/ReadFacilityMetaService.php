<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-20
 * Time: 15:11
 */
declare(strict_types=1);
namespace App\Services;

use App\Repository\FacilityMetaRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class ReadFacilityService
 *
 * facilityーブルの情報を取得するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio
 * @package App\Services
 */
class ReadFacilityMetaService {
  private $facilityMetaRepository;

  /**
   * ReadFacilityService constructor.
   *
   * @param FacilityMetaRepositoryInterface $FacilityMetaRepository
   */
  public function __construct(FacilityMetaRepositoryInterface $FacilityMetaRepository) {

    $this->facilityMetaRepository = $FacilityMetaRepository;
  }

  /**
   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードを
   * 1件取得するメソッドです。
   *
   * @param int $id 施設ID
   * @return array
   */
  public function getFacilityMetaRecords($id) {

    $facility_meta = array();

    $metaRecords = $this->facilityMetaRepository->getFacilityMetaRecords($id);

    foreach ($metaRecords as $metaRecord) {
      $facility_meta[$metaRecord['meta_key']] = $metaRecord['meta_value'];
    }

    return $facility_meta;

  }

  /**
   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードを
   * 1件取得するメソッドです。
   *
   * @param int $type 施設ID
   * @return array
   */
  public function getFacilityMetaRecordsByType($type) {

    $facility_meta = array();


    $result = $this->facilityMetaRepository->getFacilityMetaRecordsByType($type);


    for ($i = 0; $i <= count($result) - 1; $i++) {
      $group[$result[$i]['meta_key']] = $result[$i]['meta_value'];
//      $group['facility_id'] = $result[$i]['facility_id'];
      $thisFacilityId = $result[$i]['facility_id'];
//      if ($i == count($result) - 1 || $result[$i + 1]['facility_id'] != $group['facility_id']) {
      if ($i == count($result) - 1 || $result[$i + 1]['facility_id'] != $thisFacilityId) {
        $facility_meta[] = ['facility_id' => $thisFacilityId, 'facility_meta' => $group];
//        $facility_meta[] = $group;
        $group = array();
      }
    }

    //スカラー変数をArrayとして扱うことはできない
//    for ($i = 1; $i <= count($result); $i++) {
//      $facility_meta = $result[$i]['facility_id'];
//      $group[$result[$i]['meta_key']] = $result[$i]['meta_value'];
////      $group['facility_id'] = $result[$i]['facility_id'];
//      if ($i == count($result) || $result[$i + 1]['facility_id'] != $facility_meta['facility_id']) {
//        $facility_meta[] = ['facility_id' => $group];
////        $facility_meta[] = $group;
//        $group = array();
//      }
//    }

//    $metaRecords = $this->facilityMetaRepository->getFacilityMetaRecordsByType($type);

//
//    foreach ($metaRecords as $metaRecord) {
//      $facility_meta[$metaRecord['meta_key']] = $metaRecord['meta_value'];
//    }

    return $facility_meta;

  }

//  /**
//   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードを
//   * 複数件取得するメソッドです。
//   *
//   * @param int $id 施設ID
//   * @return array
//   */
//  public function findFacilityMetaRecords(int $id): array {
//    return $this->FacilityMetaRepository->findFacilityMetaRecords($id);
//
//  }
}
