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
    return;
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
    $query = DB::table('facility_basicinfo');
    // ->join('facility_hours', 'facility_basicinfo.id', '=', 'facility_hours.facility_id');

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
      'facility_basicinfo.facility_name as title',
      'facility_basicinfo.facility_type  as genre',
      'facility_basicinfo.facility_bio  as bio',
      'facility_basicinfo.facility_address  as address',
      'facility_spot.facility_lat as lat',
      'facility_spot.facility_lng as lng',
      'facility_basicinfo.facility_phone  as phone',
      'facility_basicinfo.facility_fax as fax',
      'facility_basicinfo.facility_email as email',
      'facility_basicinfo.facility_url as url',
      'facility_basicinfo.facility_toilet as toilet',
      'facility_basicinfo.facility_signlanguage as signlanguage',
      'facility_basicinfo.facility_elevator as elevator',
      'facility_basicinfo.facility_wheelchair as wheelchair',
      'facility_basicinfo.facility_parking as parking',
      // 'facility_hours.*',
      'facility_basicinfo.created_at as createdAt',
      'facility_basicinfo.updated_at as updatedAt'
    )
      ->whereRaw('TRUNCATE(
        (
            6371 * acos(
                cos(radians(?)) * 
                cos(radians(facility_spot.facility_lat)) * 
                cos(radians(facility_spot.facility_lng) - 
                radians(?)) + sin(radians(?)) * sin(radians(facility_spot.facility_lat))
            )
        ) + 0.005, 2 ) <= 5')->setBindings([$lng, $lat, $lng])
      ->get();

    // 施設タイプと距離で絞り込んだ結果からidを取りだし、priceテーブルから情報を取得
    $id_list = array();
    foreach ($data as $facility) {
      array_push($id_list, $facility->id);
    }
    $id_list = array_unique($id_list);
    $price_list = DB::table('facility_price')
      ->wherein('facility_id', $id_list)
      ->select(
        'facility_id',
        'price_title as priceTitle',
        'price_adult as priceAdult',
        'price_adult_discounted as priceAdultDiscounted',
        'price_child as priceChild',
        'price_child_discounted as priceChildDiscounted',
        'price_detail as priceDetail'
      )
      ->get();
    $hours_list = DB::table('facility_hours')
      ->select(
        'facility_id',
        'mon_open as monOpen',
        'mon_close as monClose',
        'tue_open as tueOpen',
        'tue_close as tueClose',
        'wed_open as wedOpen',
        'wed_close as wedClose',
        'thu_open as thuOpen',
        'thu_close as thuClose',
        'fri_open as friOpen',
        'fri_close as friClose',
        'sat_open as satOpen',
        'sat_close as satClose',
        'sun_open as sunOpen',
        'sun_close as sunClose',
        'holiday'
      )
      ->wherein('facility_id', $id_list)->get();

    // 変数の初期化
    unset($facility);

    // facility_priceテーブルからレコード取得
    foreach ($data as $facility) {
      $price_array = array();
      foreach ($price_list as $price) {
        if ($facility->id === $price->facility_id) {
          array_push($price_array, $price);
        }
      }
      $facility->price = $price_array;
    }

    // 変数の初期化
    unset($facility);
    // facility_hourテーブルからレコード取得
    foreach ($data as $facility) {
      foreach ($hours_list as $hour) {
        if ($facility->id === $hour->facility_id) {
          $facility->businessHour = $hour;
        }
      }
    }

    // 変数の初期化
    unset($facility);

    // facility_idプロパティが重複しているため、削除
    foreach ($data as $facility) {
      unset($facility->businessHour->facility_id);
      foreach ($facility->price as $price) {
        unset($price->id);
        unset($price->facility_id);
      }
    }

    return $data;
  }
}
