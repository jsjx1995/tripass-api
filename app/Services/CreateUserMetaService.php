<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-22
 * Time: 12:10
 */
declare(strict_types=1);
namespace App\Services;

use App\Repository\UserMetaRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class UserMetaSelectController
 *
 * user_metaテーブルの情報を取得するためのコントローラです。
 *
 * @Author: Akio
 * @package App\Services
 */
class CreateUserMetaService {
  private $UserMetaRepository;

  /**
   * CreateUserMetaService constructor.
   *
   * @param UserMetaRepositoryInterface $UserMetaRepository
   */
  public function __construct(UserMetaRepositoryInterface $UserMetaRepository) {

    $this->UserMetaRepository = $UserMetaRepository;
  }

  /**
   * user_metaテーブルに同時に複数件レコードを追加するためのメソッドです。
   *
   * @param array $saveData
   * @return mixed
   */
  public function createUser(array $saveData) {
    return $this->UserMetaRepository->createUser($saveData);
  }
}
