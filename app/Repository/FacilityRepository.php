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
    $data = $query->select(
      'facility_basicinfo.id',
      'facility_basicinfo.facility_name',
      'facility_basicinfo.facility_type',
      'facility_basicinfo.facility_bio',
      'facility_basicinfo.facility_address',
      'facility_spot.facility_lat',
      'facility_spot.facility_lng',
      'facility_basicinfo.facility_phone',
      'facility_basicinfo.facility_fax',
      'facility_basicinfo.facility_email',
      'facility_basicinfo.facility_url',
      'facility_basicinfo.facility_toilet',
      'facility_basicinfo.facility_signlanguage',
      'facility_basicinfo.facility_elevator',
      'facility_basicinfo.facility_wheelchair',
      'facility_basicinfo.facility_parking',
      'facility_hours.*',
      'facility_basicinfo.created_at',
      'facility_basicinfo.updated_at'
    )
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
    $id_list = array_unique($id_list);
    $price_list = DB::table('facility_price')->wherein('facility_id', $id_list)->get();

    unset($facility);

    foreach ($data as $facility) {
      $price_array = array();
      foreach ($price_list as $price) {
        if ($facility->facility_id === $price->facility_id) {
          array_push($price_array, $price);
        }
      }
      $facility->price = $price_array;
    }

    foreach ($data as $value) {
      unset($value->facility_id);
      foreach ($value->price as $price) {
        unset($price->id);
        unset($price->facility_id);
      }
    }

    return $data;
  }
}
