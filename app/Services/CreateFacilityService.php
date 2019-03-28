<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-20
 * Time: 17:13
 */
declare(strict_types=1);
namespace App\Services;

use App\Repository\FacilityRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class ReadUserService
 *
 * facilityテーブルの情報を取得するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio
 * @package App\Services
 */
class CreateFacilityService {
  private $FacilityRepository;

  /**
   * ReadFacilityService constructor.
   *
   * @param FacilityRepositoryInterface $FacilityRepository
   */
  public function __construct(FacilityRepositoryInterface $FacilityRepository) {

    $this->FacilityRepository = $FacilityRepository;
  }

  /**
   * facilityテーブルに同時に複数件レコードを追加するためのメソッドです。
   *
   * @param array $saveData
   * @return mixed
   */
  public function createFacility(array $saveData) {
    return $this->FacilityRepository->createFacility($saveData);
  }
}
