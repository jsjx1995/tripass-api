<?php
/**
 * Created by PhpStorm.
 * User: Akio Inoue
 * Date: 2019/03/18
 * Time: 16:23
 */

declare(strict_types=1);
namespace App\Services;

use App\Repository\UserMetaRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class UpdateUserMetaService
 *
 * user_metaテーブルの情報を更新するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio Inoue
 * @package App\Services
 */
class UpdateUserMetaService {
  private $userMetaRepository;

  /**
   * UpdateUserMetaService constructor.
   * コンストラクタです。
   *
   * @param userMetaRepositoryInterface $userMetaRepository
   */
  public function __construct(userMetaRepositoryInterface $userMetaRepository) {

    $this->userMetaRepository = $userMetaRepository;
  }

  /**
   * ユーザーIDをキーにして取得したレコードのメタ情報を更新するメソッドです。
   *
   * @param $saveData
   */
  public function updateUserMetaRecords($saveData) {

    return $this->userMetaRepository->updateUserMetaRecords($saveData);
  }
}
