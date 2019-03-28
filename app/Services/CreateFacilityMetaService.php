<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-22
 * Time: 13:30
 */
declare(strict_types=1);
namespace App\Services;

use App\Repository\FacilityMetaRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class CreateFacilityMetaService
 *
 * facilityテーブルの情報を取得するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio Inoue
 * @package App\Services
 */
class CreateFacilityMetaService {
  private $FacilityMetaRepository;

  /**
   * CreateFacilityMetaService constructor.
   *
   * @param FacilityMetaRepositoryInterface $FacilityMetaRepository
   */
  public function __construct(FacilityMetaRepositoryInterface $FacilityMetaRepository) {

    $this->FacilityMetaRepository = $FacilityMetaRepository;
  }

  /**
   * facilitiesテーブルとfacility_metaテーブルに
   * 同時に複数件追加するためのメソッドです。
   *
   * @param array $saveData
   * @return mixed
   */
  public function createFacility(array $saveData) {
    return $this->FacilityMetaRepository->createFacility($saveData);
  }
}
