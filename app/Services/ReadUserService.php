<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-19
 * Time: 17:15
 */
declare(strict_types=1);
namespace App\Services;

use App\Repository\UserRepositoryInterface;

/**
 * Class ReadUserService
 *
 * usersテーブルの情報を取得するための
 * ビジネスロジックを担当するクラスです。
 *
 * @Author: Akio
 * @package App\Services
 */
class ReadUserService {
  private $UserRepository;

  /**
   * ReadUserService constructor.
   *
   * @param UserRepositoryInterface $UserRepository
   */
  public function __construct(UserRepositoryInterface $UserRepository) {

    $this->UserRepository = $UserRepository;
  }

  /**
   * ユーザーIDでユーザー情報を取得します。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function findUser(int $id): array {
    return $this->UserRepository->find($id);

  }

  /**
   * emailアドレス指定でユーザー情報を取得します。
   *
   * @param string $userEmail
   * @return array
   */
  public function whereUserEmail(string $userEmail): array {
    return $this->UserRepository->whereUserEmail($userEmail);
  }
}
