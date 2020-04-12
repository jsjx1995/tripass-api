<?php

/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-20
 * Time: 15:11
 */

declare(strict_types=1);

namespace App\Services;

use App\FacilityBasicinfo;
use App\Repository\FacilityRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class ReadFacilityService
 *
 * 施設情報を取得するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio
 * @package App\Services
 */
class ReadFacilityService
{
  private $FacilityRepository;

  /**
   * ReadFacilityService constructor.
   *
   * @param FacilityRepositoryInterface $FacilityRepository
   */
  public function __construct(FacilityRepositoryInterface $FacilityRepository)
  {

    $this->FacilityRepository = $FacilityRepository;
  }

  /**
   * 施設IDでユーザー情報を取得します。
   *
   * @param int $facilityId 施設ID
   * @return array
   */
  public function findFacility(int $facilityId): array
  {
    return $this->FacilityRepository->findFacility($facilityId);
  }

  /**
   * 施設タイプと緯度経度情報で施設情報を取得します。
   *
   * @param string $facilityEmail 施設ID
   * @param string $lat 施設軽度
   * @param string $lng 施設緯度
   * @return array
   */
  public function findNearFacilityByFacilityType(string $type, string $lat, string $lng)
  {
    return $this->FacilityRepository->findNearFacilityByFacilityType($type, $lat, $lng);
  }
}
