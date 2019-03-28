<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-22
 * Time: 12:08
 */
declare(strict_types=1);
namespace App\Services;

use App\Repository\UserMetaRepositoryInterface;

/**
 * Class ReadUserMetaService
 *
 * user_metaテーブルの情報を取得するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio
 * @package App\Services
 */
class ReadUserMetaService {
  private $UserMetaRepository;

  /**
   * ReadUserMetaService constructor.
   *
   * @param UserMetaRepositoryInterface $UserMetaRepository
   */
  public function __construct(UserMetaRepositoryInterface $UserMetaRepository) {

    $this->UserMetaRepository = $UserMetaRepository;
  }

  /**
   * ユーザーIDとmeta_keyに紐づくuser_metaテーブルのレコードを
   * 1件取得するメソッドです。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function findUserMetaRecord(int $id, string $key): array {
    return $this->UserMetaRepository->findUserMetaRecord($id, $key);
  }

  /**
   * ユーザーIDとmeta_keyに紐づくuser_metaテーブルのレコードを
   * 複数件取得するメソッドです。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function findUserMetaRecords(int $id): array {
    return $this->UserMetaRepository->findUserMetaRecords($id);

  }
}
