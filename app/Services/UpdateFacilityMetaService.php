<?php
/**
 * Created by PhpStorm.
 * User: Akio Inoue
 * Date: 2019/03/18
 * Time: 16:09
 */

declare(strict_types=1);
namespace App\Services;

use App\Repository\FacilityMetaRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class UpdateFacilityMetaService
 *
 * facility_metaテーブルの情報を更新するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio Inoue
 * @package App\Services
 */
class UpdateFacilityMetaService {
  private $facilityMetaRepository;

  /**
   * UpdateFacilityMetaService constructor.
   * コンストラクタです。
   *
   * @param FacilityMetaRepositoryInterface $facilityMetaRepository
   */
  public function __construct(facilityMetaRepositoryInterface $facilityMetaRepository) {

    $this->facilityMetaRepository = $facilityMetaRepository;
  }

  /**
   * 施設IDをキーにして取得したレコードのメタ情報を更新するメソッドです。
   *
   * @param $saveData
   */
  public function updateFacilityMetaRecords($saveData) {

    return $this->facilityMetaRepository->updateFacilityMetaRecords($saveData);
  }
}
