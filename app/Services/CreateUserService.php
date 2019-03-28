<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-19
 * Time: 17:24
 */
declare(strict_types=1);
namespace App\Services;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class UserCreateService
 *
 * Class comment.
 *
 * @Author: Akio
 * @package App\Services
 */
class CreateUserService {
  private $UserRepository;

  /**
   * CreateUserService constructor.
   *
   * @param UserRepositoryInterface $UserRepository
   */
  public function __construct(UserRepositoryInterface $UserRepository) {

    $this->UserRepository = $UserRepository;
  }

  /**
   * ユーザーIDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function find(int $id) {
    return $this->UserRepository->find($id);
  }

  /**
   * usersテーブルから指定したEmailに該当したレコードを
   * 取得するメソッドです。
   *
   * @param string $userEmail ユーザーのアドレス
   * @return array
   */
  public function whereUserEmail(string $userEmail): array {
    return $this->UserRepository->whereUserEmail($userEmail);
  }
}
