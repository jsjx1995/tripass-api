<?php

namespace App;

use App\Repository\FacilityMetaRepositoryInterface;
use App\Facility;
use App\FacilityMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 *
 * Facilityテーブルの操作を行う具象クラスです。
 *
 * @Author: Akio Inoue
 * @package App\Repository
 */
class FacilityMetaRepository implements FacilityMetaRepositoryInterface {
  /**
   * 施設IDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id 施設ID
   * @return array
   */
  public function getFacilityMetaRecords(int $id) {
    // FacilitiesとFacilityMetaのリレーションを利用してデータを取得
    return Facility::findOrFail($id)->facilityMeta()->get();
  }

  /**
   * 施設タイプに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $type 施設タイプ
   * @return array
   */
  public function getFacilityMetaRecordsByType(int $type) {
    // FacilitiesとFacilityMetaのリレーションを利用してデータを取得
//    return Facility::where('type', $type)->facilityMeta()->get();

    return Facility::select('meta_key', 'meta_value', 'facility_id')->join('facility_meta', 'facilities.id', '=', 'facility_meta.facility_id')->where('facilities.type', $type)->get()->toArray();
  }

//  /**
//   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードを
//   * 複数件取得するメソッドです。
//   *
//   * @param int $id 施設ID
//   * @param array $keys 取得したいmeta_keyのリスト
//   * @return array
//   */
//  public function findFacilityMetaRecords(int $id, $key): array {
//    // FacilitiesとFacilityMetaのリレーションを利用してデータを取得
//    return Facility::findOrFail($id)->facilityMeta()->get()->toArray();
//  }

  /**schema
   * facilitiesテーブルとfacility_metaテーブルに
   * 同時に複数件レコードを追加するためのメソッドです。
   *
   * @param array $saveData 登録データ
   * @return bool
   * @throws \Throwable
   */
  public function createFacility(array $saveData) {
    $facility = new Facility();
    $facilityData = $saveData[Facility::CLIENT_DTO_KEY];
    $this->setSaveFacilityData($facilityData, $facility);

    $registerMetaData = $this->setSaveFacilityMetaData($saveData);

    //途中で登録が失敗した場合はロールバックします。
    DB::transaction(function () use ($facility, $registerMetaData) {
      $facility->save();
      $facility->facilityMeta()->createMany($registerMetaData);
    });

    return true;
  }

  public function updateFacilityMetaRecords(array $saveData) {
    $id = $saveData['facility_id'];

    $registerMetaData = $this->setSaveFacilityMetaData($saveData);

    DB::transaction(function () use ($id, $registerMetaData) {
      $count = count($registerMetaData);
      for ($i = 0; $i < $count; $i++) {
        Facility::findOrFail($id)->facilityMeta()->where('meta_key', $registerMetaData[$i]['meta_key'])->updta(['meta_value' => $registerMetaData[$i]['meta_value']]);
      }
    });

    return true;

//    $facility = Facility::findOrFail($saveData['id']);
//    $facility->facility_name = $saveData['facility_name'];
//    $facility->facility_type = $saveData['facility_type'];
  }

  private function setSaveFacilityMetaData(array $saveData): array {
    $registerMetaData = [];
    $metaData = $saveData[FacilityMeta::CLIENT_DTO];
    foreach ($metaData as $key => $value) {
      $registerMetaData[] = ['meta_key' => $key, 'meta_value' => $value];
    }

    return $registerMetaData;
  }

  /**
   * Facilitiesのインスタンスに保存する情報をセットして返却します。
   *
   * @param $facilityData 登録データ
   * @param Facility $facility Facilityのインスタンス
   * @return void 登録情報がセットされたFacilityのインスタンス
   */
  private function setSaveFacilityData($facilityData, Facility $facility): void {
    $facility->author_id = $facilityData['author_id'];
    $facility->facility_name = $facilityData['facility_name'];
    $facility->facility_type = $facilityData['facility_type'];
  }
}