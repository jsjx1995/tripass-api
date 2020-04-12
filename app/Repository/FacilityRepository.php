<?php

namespace App;

use App\Repository\FacilityRepositoryInterface;
use App\FacilitySpot;
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
class FacilityRepository implements FacilityRepositoryInterface
{
  /**
   * 施設IDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id 施設ID
   * @return array
   */
  public function findFacility(int $id)
  {
    return Facility::findOrFail($id)->toArray();
  }

  /**
   * facilitiesテーブルから指定したEmailに該当したレコードを
   * 取得するメソッドです。
   *
   * @param string $facility_type 施設タイプ
   * @param string $facility_lat 経度
   * @param string $facility_lng 緯度
   * @return array
   */
  public function findNearFacilityByFacilityType(string $type, string $lat, string $lng)
  {
    $query = DB::table('facility_basicinfo')
      ->join('facility_hours', 'facility_basicinfo.id', '=', 'facility_hours.facility_id');

    if ($type !== 'all') {
      $types = explode(',', $type);
      $count = count($types);
      if ($count === 1) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0]
            ]);
        });
      } else if ($count === 2) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0], $types[1]
            ]);
        });
      } else if ($count === 3) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0], $types[1], $types[2]
            ]);
        });
      } else if ($count === 4) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0], $types[1], $types[2], $types[3]
            ]);
        });
      } else if ($count === 5) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0], $types[1], $types[2], $types[3], $types[4]
            ]);
        });
      } else if ($count === 6) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0], $types[1], $types[2], $types[3], $types[4], $types[5]
            ]);
        });
      } else if ($count === 7) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0], $types[1], $types[2], $types[3], $types[4], $types[5], $types[6]
            ]);
        });
      } else if ($count === 8) {
        $query->join('facility_spot', function ($join) use ($types) {
          $join->on('facility_basicinfo.id', '=', 'facility_spot.facility_id')
            ->whereIn('facility_basicinfo.facility_type', [
              $types[0], $types[1], $types[2], $types[3], $types[4], $types[5], $types[6], $types[7]
            ]);
        });
      }
    } else {
      $query->join('facility_spot', 'facility_spot.facility_id', '=', 'facility_basicinfo.id');
    }
    $data = $query->select('facility_basicinfo.*', 'facility_hours.*')
      ->whereRaw('TRUNCATE(
        (
            6371 * acos(
                cos(radians(?)) * cos(radians(facility_spot.facility_lat)) * cos(radians(facility_spot.facility_lng) - radians(?)) + sin(radians(?)) * sin(radians(facility_spot.facility_lat))
            )
        ) + 0.005, 2 ) <= 5')->setBindings([$lng, $lat, $lng])
      ->get();

    // 施設タイプと距離で絞り込んだ結果からidを取りだし、priceテーブルから情報を取得
    $id_list = array();
    foreach ($data as $facility) {
      array_push($id_list, $facility->facility_id);
    }
    $price_list = DB::table('facility_price')->wherein('facility_id', $id_list)->get();


    foreach ($data as $facility) {
      foreach ($price_list as $value) {
        if ($facility->facility_id === $value->facility_id) {
          $facility->price = $value;
        }
      }
    }
    // print_r($data);

    return $price_list;
  }
}
